const initFormDOM = (formInformation , FORM_ID_CURRENT) => {
    let formJSON = JSON.parse(formInformation);

    let componente = document.getElementById("formio");

    Formio.createForm(componente, formJSON).then((form) => {
        // Register for the submit event to get the completed submission.
        form.on("submit", function (submission) {
            // Send the submission to the server.
            submission.form_id = FORM_ID_CURRENT;
            Livewire.emit('saveInformation', submission);
        });
    });
};

export default { initFormDOM };
