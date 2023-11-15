// No funciona
HTMLFormElement.prototype.reset = function () {
    var inputs = this.querySelectorAll("input[type='text']");
    inputs.forEach(function(input) {
        input.value = "";
    });
};

// Funciona
function resetForm(form) {
    var inputs = form.querySelectorAll("input[type='text']");
    inputs.forEach(function(input) {
        input.value = "";
    });
}