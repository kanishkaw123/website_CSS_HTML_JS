//calling browserOnline.php
function browserOnline(){
    console.log('browserOnline')
    jQuery.ajax({
      type: "POST",
      url: 'browserOnline.php',
      dataType: 'json',
      data: {functionname: 'online', arguments:[0]},
    
        success: function (obj, textstatus) {
                      if( !('error' in obj) ) {
                          console.log('time_updated');
                      }
                      else {
                          console.log(obj.error);
                      }
                }
    });
  }
setInterval(browserOnline,5000)
  //##########################################

//logout user from session
function activityCheck(){
    console.log('activity Check');
    jQuery.ajax({
    type: "POST",
    url: 'sessionManage.php',
    dataType: 'json'});
    $('#messagesDataPanel').load(window.location.href + ' #messagesDataPanel');
    $('#loginPanel').load(window.location.href + ' #loginPanel');
  }
  //#########################################


//checking user activity 13 seconds
var time = new Date().getTime();
$(document.body).bind("mousemove keypress", function(e) {
time = new Date().getTime();
});

function refresh() {
    if(new Date().getTime() - time >= 93000){
      activityCheck()
    }
    if(new Date().getTime() - time >= 95000) {
      $('#messagesDataPanel').load(window.location.href + ' #messagesDataPanel');
      $('#loginPanel').load(window.location.href + ' #loginPanel');
    }
    else {
      setTimeout(refresh, 1000);
    }
}

setTimeout(refresh, 1000);
console.log('reached')

//###########################################


//reload messages panel every 5 minutes
function reloadPanel(){
    $('#messagesDataPanel').load(window.location.href + ' #messagesDataPanel');
    console.log('done');
}

setInterval(reloadPanel,2000)
//########################################################