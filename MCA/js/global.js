var addListForm = document.getElementById("addToDoForm");
if (addListForm)
    addListForm.addEventListener("submit", onSubmit);
function onSubmit()
{
    var completedTasks = document.getElementById("completed-tasks").querySelectorAll("li  label");;
    var inCompleteTasks = document.getElementById("incomplete-tasks").querySelectorAll("li  label");;
    for(var i = 0; i < completedTasks.length; i++)
    {
        
        var item = document.createElement("input");
        item.setAttribute("type", "hidden");
        item.setAttribute("name", completedTasks[i].innerHTML);
        item.setAttribute("value", "active");
        addListForm.appendChild(item);
        
    }
        for(var i = 0; i < inCompleteTasks.length; i++)
    {
        
        var item = document.createElement("input");
        item.setAttribute("type", "hidden");
        item.setAttribute("name", inCompleteTasks[i].innerHTML);
        item.setAttribute("value", "pending");
        addListForm.appendChild(item);
    }
}

