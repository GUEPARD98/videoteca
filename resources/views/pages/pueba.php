
<?php
/* question    1*/

$myArray = array(13, 2, 4, 35, 1);

$max = $myArray[0];

foreach ($myArray as $num) {

    if ($num > $max) {
        $max = $num;
    }
}

echo $max;

/* question 2 */

$n = 6;

$matrix = '';

if ($n == 0) {
    $output = "ERROR";
} else {
    for ($i = 0; $i < $n; $i++) {
        for ($j = 0; $j < $n; $j++) {
            if ($i == $j || $i + $j == $n - 1) {
                $matrix = $matrix . "X";
            } else {
                $matrix = $matrix . "_";
            }
        }
        $matrix .= "\n";
    }
}

echo $matrix;


/* quetion 3 */

$myArray = array(1, 2, 1, 3, 3, 1, 2, 1, 5, 1);

$frecuencias = array(
    1 => 0,
    2 => 0,
    3 => 0,
    4 => 0,
    5 => 0
);

foreach ($myArray as $num) {
    $frecuencias[$num]++;
}

var_dump($frecuencias);

for ($i = 1; $i <= 5; $i++) {
    echo $i . ": ";
    for ($j = 0; $j < $frecuencias[$i]; $j++) {
        echo "*";
    }
    echo "\n";
}

/* quuestion 4 */

$myArray = array(1, 2, 2, 5, 4, 6, 7, 8, 8, 8);

// variables para almacenar el número y la longitud de la secuencia más larga
$longest = 1;
$number = $myArray[0];
$count = 1;

// iterar sobre el arreglo de izquierda a derecha
for ($i = 1; $i < count($myArray); $i++) {
    // si el elemento actual es igual al anterior, aumentar la longitud de la secuencia actual
    if ($myArray[$i] == $myArray[$i - 1]) {
        $count++;
    } else { // si no, verificar si la secuencia actual es más larga que la anterior y actualizar las variables correspondientes
        if ($count > $longest) {
            $longest = $count;
            $number = $myArray[$i - 1];
        }
        $count = 1;
    }
}

// verificar si la última secuencia es la más larga
if ($count > $longest) {
    $longest = $count;
    $number = $myArray[count($myArray) - 1];
}

// imprimir los resultados
echo "Longest: " . $longest . "\n";
echo "Number: " . $number . "\n";


/* SELECT firstname, lastname, salary
FROM APPX_employee
WHERE salary BETWEEN 50000 AND 100000
ORDER BY firstname ASC; */

$myArray = array(1, 2, 2, 5, 4, 6, 7, 8, 8, 8);

// contar las ocurrencias de cada elemento en el array
$counts = array_count_values($myArray);

// encontrar el valor con la mayor cantidad de ocurrencias
$number = array_search(max($counts), $counts);

// mostrar los resultados
echo "Longest: " . max($counts) . "\n";
echo "Number: " . $number . "\n";
0

    /*
SELECT APPX_department.department_name, COUNT(*)
FROM APPX_department APPX_department
JOIN APPX_employee e ON APPX_department.id = e.department_id
GROUP BY APPX_department.department_name
HAVING COUNT(*) >= 2
ORDER BY APPX_department.department_name  */

    /* array myArray:=(4, 27, 62, 16, 95) // Ejemplo de arreglo con 5 elementos

max := myArray[1] // Inicializar la variable max con el primer elemento del arreglo

for i:=2 to 5 do
  if myArray[i] > max then
    max := myArray[i] // Actualizar el valor máximo si se encuentra un número mayor
  endif
next

println 'El número máximo en el arreglo es: ' + max
 */

    /*
i := 2
while i <= 5 do
  if myArray[i] > max then
    max := myArray[i]
  endif
  i := i + 1
endwhile
*/

    /* n:=6
matrix:=''
if n=0 then
output:='ERROR'
else
for i:=0 to n-1
for j:=0 to n-1
if i=j or i+j=n-1 then
matrix:=matrix+'X'
else
matrix:=matrix+'_'
endif
next
matrix:=matrix + Chr(10)
next
endif
Println matrix
 */




    /*
let myArray := [12, 14, 14, 8, 8, 8, 3, 3];
let longest := 1;
let count := 1;
let number := myArray[0];

for (let i := 1; i < myArray.length; i++) {
    if (myArray[i] == myArray[i - 1]) {
        count++;
    } else {
        if (count > longest) {
            longest := count;
            number := myArray[i - 1];
        }
        count := 1;
    }
}

if (count > longest) {
    longest := count;
    number := myArray[myArray.length - 1];
}

output("Longest: " + longest + "\n");
output("Number: " + number + "\n");

*/


    /*
myArray := [1, 2, 3, 1, 2, 3, 3, 3, 4, 5]

// Inicializar variables para el número que más se repite y su cantidad de ocurrencias
mostCommonNumber := 0
mostCommonCount := 0

// Iterar sobre el arreglo de izquierda a derecha
for i := 0; i < Len(myArray); i++ {
    count := 0
    // Iterar sobre el arreglo para contar el número de ocurrencias del elemento actual
    for j := 0; j < Len(myArray); j++ {
        if myArray[j] == myArray[i] {
            count++
        }
    }
    // Si el número actual se repite más veces que el anteriormente considerado, actualizar las variables correspondientes
    if count > mostCommonCount {
        mostCommonCount = count
        mostCommonNumber = myArray[i]
    }
}

// Imprimir los resultados
print("Rep: ", mostCommonCount, "\n")
print("Val: ", mostCommonNumber, "\n")
*/


    /*
max:=0
maxCount:=0
for i:=1 to 5
  count:=0
  for j:=1 to 10
    if myArray[j]=i then
      count:=count+1
    endif
  next
  if count>maxCount then
    maxCount:=count
    max:=i
  endif
next
Println 'Rep: ' + max
Println 'Val: ' + maxCount
*/


    /* TLang es un lenguaje muy simple utilizado para responder a las preguntas de programación de Evalart. A continuación un ejemplo que usa todas las instrucciones de TLang que puedes usar como referencia. Mas abajo se listan a detalle los comandos y características.

Println 'Texto con salto de linea'
Print 'Texto sin salto de linea'
array miArreglo:=(1,2,3)
n:=3
for a:=1 to n
println 'Valor de mi arreglo ' + miArreglo[n]
next
j:=0
while j<10 do
j:=j+1
if j<>5 or j>8 then
println 'El cuadrado de j es ' + j*j
endif
endwhile

Variables
---------
Las variables deben tener nombres con solo letras y se soportan booleanos, números enteros y cadenas. También es posible tener arreglos uni-dimensionales. Las variables deben tener asignado un valor para poder ser referenciadas. Solo los arreglos se deben declarar antes de asignar, utilizando el comando array. Ejemplos:
Array b
b[1]:='Hola'
Array a:=(1,2,3)
micadena:='Texto'
miboolean:=true
minumero:=456
Las cadenas se colocan entre comilas simples. Los indices de los arreglos parten en 1.

Comandos
--------
Para imprimir datos existen los comandos PRINT y PRINTLN. El primero no incluye salto de linea, mientras que el segundo si. Ejemplos:
Print a
Println 'Texto'
Print a*2+1

La sentencia IF funciona como en otros lenguajes. Ejemplos de su uso:
If 1<2 or 20>10 then
Print 'No se imprime'
else
Print 'Si se imprime'
endif

If 2>1 then 'Se imprime' endif

Los bucles son soportados con los comandos FOR y WHILE. Ejemplos:
While j>10 do
print j
endwhile
for a:=1 to 3
print a
next

Las condiciones lógicas soportan OR y AND. Paréntesis y operaciones anidadas también están soportados. Por ejemplo:
a:=4*(1+(2-3))
if (((a+2)>(2*3+1)) or (2*3+1>(1+2*3)) and 10>20)=false then
print 'se imprime'
endif */;

/* ecuela de michis */

$escula = array(
    array(
        'nombre' => 'Michijose',
        'ocupacion' => 'Developer',
        'color' => 'naranga',
        'comidas' => array('favoritas' => array('Arroz', 'Lasama'))
    ),
    array(
        'nombre' => 'Michihenner',
        'ocupacion' => 'Developer2 ',
        'color' => 'naranga2'
    )
);

$count =  readline("ingrese cantidad de doniciones");

if ($count >= 100) {
    echo 'Tu retiro esta en proceso';
} else {
    echo 'No puede';
}
echo "\n";

$tienda = 3;


$contador = 0;

while ($contador < 10) {
    echo $contador . "\n";
}
