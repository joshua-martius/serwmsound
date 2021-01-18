window.onload = function(){
    document.querySelectorAll(".drop-zone__input").forEach(inputElement => {
        const dropZoneElement = inputElement.closest(".drop-zone");

        dropZoneElement.addEventListener("dragover", e => {
            e.preventDefault();
        });

        dropZoneElement.addEventListener("drop", e => {
            e.preventDefault();
            if(e.dataTransfer.files.length)
            {
                inputElement.files = e.dataTransfer.files;
		document.getElementById('frmUploader').submit();
            }
        });
    });
}
