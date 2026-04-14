import './bootstrap';

import { Calendar } from '@fullcalendar/core';
import dayGridPlugin from '@fullcalendar/daygrid';
import interactionPlugin from '@fullcalendar/interaction';
import listPlugin from '@fullcalendar/list';

window.FullCalendar = {
    Calendar: Calendar,
    dayGridPlugin: dayGridPlugin,
    interactionPlugin: interactionPlugin,
    listPlugin: listPlugin
};

import Alpine from 'alpinejs';
window.Alpine = Alpine;
Alpine.start();

// 🔥 TinyMCE
import tinymce from 'tinymce/tinymce';

// theme & icons
import 'tinymce/icons/default';
import 'tinymce/themes/silver';
import 'tinymce/models/dom';

// plugins
import 'tinymce/plugins/lists';
import 'tinymce/plugins/link';
import 'tinymce/plugins/image';
import 'tinymce/plugins/table';
import 'tinymce/plugins/code';
import 'tinymce/plugins/help';
import 'tinymce/plugins/wordcount';
import 'tinymce/plugins/advlist';
import 'tinymce/plugins/autolink';
import 'tinymce/plugins/charmap';
import 'tinymce/plugins/preview';
import 'tinymce/plugins/anchor';
import 'tinymce/plugins/searchreplace';
import 'tinymce/plugins/visualblocks';
import 'tinymce/plugins/fullscreen';
import 'tinymce/plugins/insertdatetime';
import 'tinymce/plugins/media';

// init
document.addEventListener('DOMContentLoaded', function () {
    if (document.querySelector('#editor')) {
        tinymce.init({
            selector: '#editor',
            height: 500,
            license_key: 'gpl',
            
            // Konfigurasi aset dari folder public yang sudah dicopy
            skin_url: '/vendor/tinymce/skins/ui/oxide',
            content_css: '/vendor/tinymce/skins/content/default/content.min.css',
            
            plugins: [
                'advlist', 'autolink', 'lists', 'link', 'image', 'charmap', 'preview',
                'anchor', 'searchreplace', 'visualblocks', 'code', 'fullscreen',
                'insertdatetime', 'media', 'table', 'help', 'wordcount'
            ],
            toolbar: 'undo redo | blocks | ' +
                'bold italic backcolor | alignleft aligncenter ' +
                'alignright alignjustify | bullist numlist outdent indent | ' +
                'removeformat | help',
            content_style: 'body { font-family:Inter,Manrope,Helvetica,Arial,sans-serif; font-size:16px }',
            
            // Matikan promosi dan branding berbayar
            branding: false,
            promotion: false,
            
            // Opsional: Jika ingin upload gambar langsung (memerlukan endpoint backend)
            // image_title: true,
            // automatic_uploads: true,
            // file_picker_types: 'image',
        });
    }
});
