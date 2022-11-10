const initForm = (livewireComponent) => {
    console.log(livewireComponent);

    let formBuilder = document.getElementById("formio");

    Formio.builder(
        formBuilder,
        {},
        {
            builder: {
                premium: false,
            },
        }
    ).then((builder) => {
        builder.on("change", (component) => {
            let inputJSON = document.getElementById("form-json");
            livewireComponent.set('form.form',JSON.stringify(builder.schema, null, 4));
        });
    });

};

export default {initForm};
