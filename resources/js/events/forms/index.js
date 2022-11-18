const initForm = (livewireComponent) => {
    console.log(livewireComponent);

    let formBuilder = document.getElementById("formio");

    let formBody = document.getElementById("form-json");
    let formBodyJSON = {};
    
    if(formBody.value){
        formBodyJSON = JSON.parse(formBody.value);
    }

    Formio.builder(
        formBuilder,
        formBodyJSON,
        {
            builder: {
                premium: false,
            },
        }
    ).then((builder) => {
        builder.on("change", (component) => {
            let inputJSON = document.getElementById("form-json");
            livewireComponent.set('form.form',JSON.stringify(builder.schema, null, 4));
            document.getElementById("form-json").value = JSON.stringify(builder.schema, null, 4);
        });
    });

};

export default {initForm};
