require('./bootstrap');

import Alpine from 'alpinejs';
window.Alpine = Alpine;

Alpine.start();


/**
 * datatabel utilisateur js
 */
$(function () {

    var table = $('#ddd').DataTable({
        dom: 'Bfrtip',
        buttons: [
            'copy', 'csv', 'excel', 'pdf', 'print'
        ],
        processing: true,
        serverSide: true,
        autoWidth: false,
        searchable: true,
        responsive: true,
        search: {
            return: true,
        },
        /*scrollY: 300,client */
        ajax: "/dashboard/liste",
        columns: [
            {data: 'DT_RowIndex', name: 'no'},
            {data: 'client', name: 'client'},
            {data: 'ramassage', name: 'ramassage'},
            {data: 'ramassage_avant', name: 'ramassage_avant'},
            {data: 'livraison', name: 'livraison'},
            {data: 'livraison_avant', name: 'livraison_avant'},
            {data: 'description', name: 'description'},
            {data: 'prix', name: 'prix'},
            {data: 'etat', render: function (id, type, row) {
            if(row.etat === 0){
                return `
                <span class="badge badge-secondary">brouillon</span>`
            }if(row.etat === 1){
                return `
                <span class="badge badge-info">encoure</span>`
            }if(row.etat === 2){
                return `<span class="badge badge-info">validé en attened de votre confirmation</span>`
            }if(row.etat === 3){
                return `<span class="badge badge-info">validé</span>`
            }if(row.etat === 4){

                return `<span class="badge badge-danger">Annuler</span>`
            } }},

            {
                data: 'action',
                name: 'action',
            },

        ],
        language: {
        search: "Recherche",
        searchPlaceholder: "Recher...",
        lengthMenu: "Voir _MENU_ Courses",
        info: "Voir _START_ > _END_ Total _TOTAL_ Courses",
        paginate: {
        next:       "Suivant",
        previous:   "Précédent"
    },
    }

    });
  });


/**
 * datatabel administrateur js
 */
 $(function () {

    var table = $('#admin').DataTable({
        dom: 'Bfrtip',
        buttons: [
            'copy', 'csv', 'excel', 'pdf', 'print'
        ],
        processing: true,
        serverSide: true,
        searchable: true,
        responsive: true,
        search: {
            return: true,
        },

        /*scrollY: 300,client */
        ajax: "/dashboard/admin/liste",


        columns: [

            {data: 'DT_RowIndex', name: 'no'},
            {data: 'client', name: 'client'},
            {data: 'ramassage', name: 'ramassage'},
            {data: 'ramassage_avant', name: 'ramassage_avant'},
            {data: 'livraison', name: 'livraison'},
            {data: 'livraison_avant', name: 'livraison_avant'},
            {data: 'description', name: 'description'},
            {data: 'prix', render: function (id, type, row) {
            if(row.etat === 1 || row.etat === 4){
                return `<form method="POST" action="/dashboard/admin_create" id="form${row.id}">
                <input id="token" type="hidden" name="_token" value="`+token.value+`" />
                <input type="text" class="w-28 rounded-xl" name="prix">
                <input type="text" name="id" value="${row.id}" style="display: none;">

               </form>`

            }else{
                return `<div class="rounded-xl bg-info" >${row.prix}€</div>`;
            } }},

            {
                data: 'action', name: 'action'},
        ],
        language: {
        search: "Recherche",
        searchPlaceholder: "Recher...",
        lengthMenu: "Voir _MENU_ Courses",
        info: "Voir _START_ > _END_ Total _TOTAL_ Courses",
        paginate: {
        next:       "Suivant",
        previous:   "Précédent"
    },
    }
    });
    });


/**
 * style de la formulaire
 *
 * */
 var btnRammasage = document.getElementById('btnRammasage');
 var btnLivraison = document.getElementById('btnLivraison');

btnRammasage.addEventListener("click", function(){
    document.getElementById('form').classList.replace('d-none', 'd-block');
            btnRammasage.innerText = "Ajouter plusieur point de Rammasage";
            btnRammasage.classList.replace("btn-success","btn-primary");


        });
btnLivraison.addEventListener("click", function(){
            btnLivraison.innerText = "Ajouter plusieur point de Livraisons"
            btnLivraison.classList.replace("btn-success","btn-primary")

        });


/***
 * creation de la formulaire de creation des courses
 */

 var i = 0;
 var clickCount = 0;
 /**
  * rammasage
  */
 $("#btnRammasage").click(function () {

     ++clickCount;
     if(clickCount >= 2){
     ++i;
     $("#inputs").append(`<div class="row">
     <div class="col-6">
 <label class="block font-medium text-sm text-gray-700" for="USERNAME">
Nom
</label>
 <input class="rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 block m-1 p-2 w-full" id="username" type="text" name="username[`+i+`][username]" required="required" autocomplete="">
</div>
<div class="col-6">
 <label class="block font-medium text-sm text-gray-700" for="telephone">
N° Téléphone
</label>
 <input class="rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 block m-1 p-2 w-full" id="telephone" type="text" name="telephone[`+i+`][telephone]" required="required" autocomplete="">
</div>

</div>
<div class="row">
<div class="col-6">
 <label class="block font-medium text-sm text-gray-700" for="email">
Adresse mail
</label>
 <input class="rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 block m-1 p-2 w-full" id="email" type="email" name="email[`+i+`][email]" required="required" autocomplete="">
</div>
<div class="col-6">
 <label class="block font-medium text-sm text-gray-700" for="orderid">
N° de commande
</label>
 <input class="rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 block mt-1 p-2 w-full" id="orderid" type="text" name="orderid[`+i+`][orderid]" required="required" autocomplete="">
</div>
</div>

<div class="mt-1">
<label class="block font-medium text-sm text-gray-700" for="adresse_rammasage">
Adresse de rammasage
</label>
<input class="rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 controls block mt-1 p-2 w-full" id="adresse_rammasage" type="text" name="adresse_rammasage[`+i+`][adresse_rammasage]">
</div>

<div class="mt-1">
<label class="block font-medium text-sm text-gray-700" for="ramassage_avant">
Ramassage avant
</label>
<input class="rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 block mt-1 p-2 w-full" id="ramassage_avant" type="datetime-local" name="ramassage_avant[`+i+`][ramassage_avant]" required="required" autocomplete="">
</div>
<div class="mt-1">
<label class="block font-medium text-sm text-gray-700" for="description">
Description
</label>
<input class="rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 block mt-1 p-2 w-full" id="description" type="text" name="description[`+i+`][description]" required="required" autocomplete="">
</div>
<div class="mt-1">
<label class="block font-medium text-sm text-gray-700" for="thumbnail">
Image de produit
</label>
<input class="rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 block m-1 p-2 w-full" id="thumbnail" type="file" name="thumbnail[`+i+`][thumbnail]">

</div>
<input type="hidden" name="adresse_livraison[`+i+`][adresse_livraison]" value="">
<input type="hidden" name="livraison_avant[`+i+`][livraison_avant]" value="">`
         );
 }});
/**
 * livraison
 */
$("#btnLivraison").click(function () {
    ++i;
     $("#inputs").append(`<div class="row">
     <div class="col-6">
 <label class="block font-medium text-sm text-gray-700" for="USERNAME">
Nom
</label>
 <input class="rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 block m-1 p-2 w-full" id="username" type="text" name="username[`+i+`][username]" required="required" autocomplete="">
</div>
<div class="col-6">
 <label class="block font-medium text-sm text-gray-700" for="telephone">
N° Téléphone
</label>
 <input class="rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 block m-1 p-2 w-full" id="telephone" type="text" name="telephone[`+i+`][telephone]" required="required" autocomplete="">
</div>

</div>
<div class="row">
<div class="col-6">
 <label class="block font-medium text-sm text-gray-700" for="email">
Adresse mail
</label>
 <input class="rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 block m-1 p-2 w-full" id="email" type="email" name="email[`+i+`][email]" required="required" autocomplete="">
</div>
<div class="col-6">
 <label class="block font-medium text-sm text-gray-700" for="orderid">
N° de commande
</label>
 <input class="rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 block mt-1 p-2 w-full" id="orderid" type="text" name="orderid[`+i+`][orderid]" required="required" autocomplete="">
</div>
</div>

<div class="mt-1">
<label class="block font-medium text-sm text-gray-700" for="adresse_livraison">
Adresse de livraison
</label>
<input class="rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 controls block mt-1 p-2 w-full" id="adresse_livraison" type="text" name="adresse_livraison[`+i+`][adresse_livraison]">
</div>

<div class="mt-1">
<label class="block font-medium text-sm text-gray-700" for="livraison_avant">
Livraison avant
</label>
<input class="rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 block mt-1 p-2 w-full" id="livraison_avant" type="datetime-local" name="livraison_avant[`+i+`][livraison_avant]" required="required" autocomplete="">
</div>
<div class="mt-1">
<label class="block font-medium text-sm text-gray-700" for="description">
Description
</label>
<input class="rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 block mt-1 p-2 w-full" id="description" type="text" name="description[`+i+`][description]" required="required" autocomplete="">
</div>

<input type="hidden" name="adresse_rammasage[`+i+`][adresse_rammasage]" value="">
<input type="hidden" name="thumbnail[`+i+`][thumbnail]" value="">
<input type="hidden" name="ramassage_avant[`+i+`][ramassage_avant]" value="">`
         );

 });





