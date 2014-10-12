//addLoadListener(initAjaxSaveJob);
window.onload = function() {
    initAjaxSaveJob();
};

function initAjaxSaveJob(){  //binding an event handler
    var saveJobButtons = document.getElementsByClassName('saveJob');
    
    for (var i = 0; i < saveJobButtons.length; i++){
        saveJobButtons[i].onclick = ajaxSaveJob;
    }
}

function ajaxSaveJob(){
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
        
        var jobId = this.id.substring('saveJob-'.length);
        //'http://localhost/dreamCareers/my_jobs/add_job?jobId="
        xhr.open('GET', 'http://localhost/dreamCareers/my_jobs/add_job?jobId=' + jobId, true);
        var ajaxStatus = this.parentNode;
        ajaxStatus.innerHTML = "saving...";
        
        xhr.onreadystatechange = function()
        {
            if(xhr.readyState == 4){
                if (xhr.status == 200 || xhr.status ==304){
                    ajaxStatus.innerHTML = "Job saved.";
                } else {
                     ajaxStatus.innerHTML = "Error saving.";
                }
            }
        };
        
        xhr.send(null);
        return false;
    }
    return true;
}