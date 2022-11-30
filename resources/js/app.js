import './bootstrap';
import 'bootstrap-icons/font/bootstrap-icons.css';

import Alpine from 'alpinejs';
import focus from '@alpinejs/focus'

window.Alpine = Alpine;
window.Alpine.plugin(focus)

Alpine.start();