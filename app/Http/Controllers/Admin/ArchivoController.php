<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Support\Facades\Storage;
use App\Http\Controllers\Controller;
use App\Models\Document;
use Illuminate\Http\Request;

class ArchivoController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->search;

        $archivos = Document::where('name', 'LIKE', "%{$search}%")->latest()->paginate();

        return view('admin.archivos.index', ['archivos' => $archivos]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.archivos.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'file' => 'nullable|file|mimes:pdf,doc,docx,xlsx,csv|max:2048',
        ]);

        $document = new Document();
        $document->name = $request->get('name');

        if ($request->hasFile('file')) {
            $url = Storage::put('public/archivos', $request->file('file'));
            $document->document = $url;
        }

        $document->save();

        return redirect()->route('admin.archivos.index')->with('info', 'Se ha creado el archivo con éxito');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  Document  $document
     * @return \Illuminate\Http\Response
     */
    public function edit(Document $document)
    {
        return view('admin.archivos.edit', ['document' => $document]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  Document  $document
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Document $document)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'file' => 'nullable|file|mimes:pdf,doc,docx,xlsx,csv|max:2048',
        ]);

        $document->name = $request->get('name');

        if ($request->hasFile('file')) {
            $url = Storage::put('public/archivos', $request->file('file'));
            if ($document->document) {
                Storage::delete($document->document);
            }
            $document->document = $url;
        }

        $document->save();

        return redirect()->route('admin.archivos.index')->with('info', 'Se ha actualizado el archivo con éxito');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Document  $document
     * @return \Illuminate\Http\Response
     */
    public function destroy(Document $document)
    {
        if ($document->document) {
            Storage::delete($document->document);
        }
        $document->delete();

        return redirect()->route('admin.archivos.index')->with('info', 'El archivo se ha eliminado con éxito');
    }
}