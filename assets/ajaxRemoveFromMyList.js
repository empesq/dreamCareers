
//addLoadListener(initAjaxRemoveJob);
window.onload = function() {
    initAjaxRemoveJob();
};

function initAjaxRemoveJob(){  //binding an event handler
    var removeJobButtons = document.getElementsByClassName('removeJob');
    
    for (var i = 0; i < removeJobButtons.length; i++){
        removeJobButtons[i].onclick = ajaxRemoveJob;
    }
}

function ajaxRemoveJob(){
    var xhr;
    
    try{
        xhr = new XMLHttpRequest();
    }catch(error)
    {
        try
        {
            xhr = new ActiveXObject('Microsoft.XMLHTTP');
        }catch(error){
            xhr = null;
        }
    }
    
    if(xhr != null){
        
        var jobId = this.id.substring('removeJob-'.length); // get the node of the job-block to be removed

        xhr.open('GET', 'http://localhost/dreamCareers/my_jobs/remove_job?jobId=' + jobId, true);
        var ajaxStatus = this.parentNode;
        ajaxStatus.innerHTML = "removing...";
        
        xhr.onreadystatechange = function()
        {
            if(xhr.readyState == 4){
                if (xhr.status == 200 || xhr.status ==304){
                    ajaxStatus.innerHTML = "Job removed from your list.";
                } else {
                     ajaxStatus.innerHTML = "Error removing.";
                }
            }
        };
        
        xhr.send(null);
        return false;
    }
    return true;
}