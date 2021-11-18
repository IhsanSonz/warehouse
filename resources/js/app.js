require('./bootstrap');
require('jquery-mask-plugin');
import $ from 'jquery';
window.$ = window.jQuery = $;

import 'jquery-ui/ui/widgets/datepicker.js';
$('.datepicker').datepicker();

import 'jquery-ui/ui/widgets/autocomplete.js';
