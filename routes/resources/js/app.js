import './bootstrap';

import Alpine from 'alpinejs';
import focus from '@alpinejs/focus';
window.Alpine = Alpine;
import.meta.glob([
    '../images/**',
  ]);
Alpine.plugin(focus);

Alpine.start();
