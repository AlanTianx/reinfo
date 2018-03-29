window.onload = function () {
    var aInput = $('#nopcontent input');
    for(var i=0;i<aInput.length;i++){
        aInput[i].onkeyup = toForWard;
    }
    function toForWard(){
        if(this.value.length === this.maxLength){
            for(var i=0;i<aInput.length;i++){
                if(aInput[i] == this){
                    aInput[i+1].focus();
                    return;
                }
            }
        }
    }
};