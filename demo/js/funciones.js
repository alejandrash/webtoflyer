function SameHeight(elt) {
        var heightBlockMax=0;
        var propertie = "height";
        $(elt).each(function(){
            var height = jQuery(this).height();
            if( height > heightBlockMax ) {
                heightBlockMax = height;
            }
        });
        $(elt).css(propertie, heightBlockMax);
}
     
function Onlynumbers(e)
    {
        var tecla=new Number();
        if(window.event) {
            tecla = e.keyCode;
        }
        else if(e.which) {
            tecla = e.which;
        }
        else {
            return true;
        }
        if((tecla >= "97") && (tecla <= "122")){
            return false;
        }
}

function Onlyprices(e)
    {
        var tecla=new Number();
        if(window.event) {
            tecla = e.keyCode;
        }
        else if(e.which) {
            tecla = e.which;
        }
        else {
            return true;
        }
        if (tecla > 31 && (tecla < 48 || tecla > 57)) {
            if (tecla == 44 ) {
                return true;
            }
            else {
                return false;
            }
        }
    }

function Onlyletters(e)
    {
        var tecla=new Number();
        if(window.event) {
            tecla = e.keyCode;
        }
        else if(e.which) {
            tecla = e.which;
        }
        else {
            return true;
        }
        if (((tecla  != 32) && (tecla < 65)) || ((tecla > 90) && (tecla < 97)) || (tecla > 122)) {
            return false;
        }
}