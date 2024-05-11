document.addEventListener('DOMContentLoaded', function () {
    var descriptionTab = document.getElementById('description-tab');
    var technicalSheetTab = document.getElementById('technical-sheet-tab');

    var description = document.getElementById('description');
    var techinicalSheet = document.getElementById('technical-sheet');

    descriptionTab.addEventListener("click", function(){
        //underline description tab
        descriptionTab.classList.add('border-gray-950');

        //remove underline from technical sheet tab
        technicalSheetTab.classList.remove('border-gray-950');

        //show description div
        description.classList.remove('hidden');
        description.classList.add('flex');

        //hide technical sheet div
        techinicalSheet.classList.add('hidden');
        techinicalSheet.classList.remove('flex');
    });

    technicalSheetTab.addEventListener("click", function(){
        //underline technical sheet tab
        technicalSheetTab.classList.add('border-gray-950');

        //remove underline from description tab
        descriptionTab.classList.remove('border-gray-950');

        //show technical sheet div
        techinicalSheet.classList.remove('hidden');
        techinicalSheet.classList.add('flex');

        //hide description div
        description.classList.add('hidden');
        description.classList.remove('flex');
    });

});
