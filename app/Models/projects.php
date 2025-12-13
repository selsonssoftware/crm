<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class projects extends Model
{
    use HasFactory;
    protected $table='projects';
    protected $guarded=[];
    protected $primaryKey = 'project_id';

}

// <script>
// document.addEventListener("DOMContentLoaded", function () {

//     document.querySelectorAll('.image-sign').forEach(input => {

//         input.addEventListener('change', function () {

//             const modal = input.closest('.modal');
//             const preview = modal.querySelector('#logo-preview');
//             const icon = modal.querySelector('#logo-icon');

//             const file = input.files[0];

//             if (file) {
//                 const reader = new FileReader();
//                 reader.onload = e => {
//                     preview.src = e.target.result;
//                     preview.style.display = 'block';
//                     if (icon) icon.style.display = 'none';
//                 };
//                 reader.readAsDataURL(file);
//             }
//         });

//     });

// });
// </script>