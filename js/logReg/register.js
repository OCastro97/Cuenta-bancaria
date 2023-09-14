const btnAnterior = document.querySelectorAll(".btn-prev")
const btnSiguiente = document.querySelectorAll(".btn-next")
const brProgreso = document.getElementById("progress")
const otrosForm = document.querySelectorAll(".form-step")
const progressSteps = document.querySelectorAll(".step-progress")

const inputs = document.querySelectorAll(".input");

let formStepsNum = 0;

btnSiguiente.forEach(btn => {
    btn.addEventListener("click", () =>{
        formStepsNum++;
        updateFormSteps();
        actualizaBarraProgreso();
    });
});

btnAnterior.forEach(btn => {
    btn.addEventListener("click", () =>{
        formStepsNum--;
        updateFormSteps();
        actualizaBarraProgreso();
    });
});

function updateFormSteps(){

    otrosForm.forEach((formStep) => {
        formStep.classList.contains ("form-step-active") &&
        formStep.classList.remove("form-step-active");
    });

    otrosForm[formStepsNum].classList.add("form-step-active");
}

function actualizaBarraProgreso(){
    progressSteps.forEach((progressStep, idx) =>{
        if (idx < formStepsNum + 1){
            progressStep.classList.add("progress-active");
        }else{
            progressStep.classList.remove("progress-active");
        }
    })

    const progressActive = document.querySelectorAll(".progress-active");

    brProgreso.style.width = ((progressActive.length - 1) / (progressSteps.length - 1)) * 100 + "%";
}


function addcl(){
	let parent = this.parentNode.parentNode;
	parent.classList.add("focus");
}

function remcl(){
	let parent = this.parentNode.parentNode;
	if(this.value == ""){
		parent.classList.remove("focus");
	}
}


inputs.forEach(input => {
	input.addEventListener("focus", addcl);
	input.addEventListener("blur", remcl);
});