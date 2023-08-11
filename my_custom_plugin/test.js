document.addEventListener("DOMContentLoaded", function() {
    console.log("Main Script is loaded");
    var button = document.createElement('button');
    button.innerText = "Click Me For popup";
    button.id='popup_button'
    console.log(document.body);
    // Get the first child of the body (which will typically be the main content)
    var firstChild = document.body.firstChild;
    // Insert the button before the first child
    document.body.insertBefore(button, firstChild);
    
    // button.addEventListener('click',function(){
    // alert("YOU CLICKED ");  
    // });

    var popup = document.createElement("div")
    popup.style.color='yellow';
    popup.innerText='This is my popup';
    popup.style.padding= '20px';
    popup.style.position='fixed';
    popup.style.top='50%';
    popup.style.left='50%';
    popup.style.display='none';
    popup.style.width = '100px';
    popup.style.height= '100px';
    popup.style.border = '2px'
    popup.style.background = 'red'
    popup.id='popup';

    document.body.appendChild(popup);

    // button.addEventListener("click",function()
    // {
    //     console.log("Hello ");  
    //     popup.style.display="block";

        
    // });
    window.addEventListener("click",function(e)
    {
        if(e.target.id === 'popup_button')
        {
            console.log("Hello ");  
            popup.style.display="block";
        }
        else if(e.target.id !== 'popup') {
            popup.style.display='none'
        }
        
    });
   
    });

//upon placing an order 