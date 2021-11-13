function checkTitle(event)
{
    var title   = document.querySelector("input[name='title']");
    var warning = document.querySelector("form #title-warning");
    var label   = document.querySelector("label");
    var form_title = document.querySelector("form #form_title")
    if(title.value ==="")
    {
        //prevent deafault, ie don't submit the form
        event.preventDefault();
        //display a warning
        warning.innerHTML = "*You must write a title for the entry";
    } 
}

function init()
{
    var editorForm = document.querySelector("form#editor");
    var title   = document.querySelector("input[name='title']");
    title.required = false;
    editorForm.addEventListener("submit", checkTitle, false);
    
}
document.addEventListener("DOMContentLoaded", init, false);
