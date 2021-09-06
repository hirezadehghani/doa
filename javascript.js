var click = document.getElementById('next');
var showdoa = document.getElementById('showform');

    click.addEventListener("click", function(){
        if(document.getElementById('doa-text').value == ''){
            alert('لطفا متن دعا را وارد کنید!');
        }
        else{
        var text_area = document.getElementById('doa-text');
        text_area.setAttribute("hidden", "true");
        click.setAttribute("hidden", "true");
        var doa_label = document.getElementById('doa-label');
        doa_label.setAttribute("hidden", "true");
        var input_name = document.getElementById('name');
        input_name.removeAttribute('hidden');
        var submit_btn = document.getElementById('submit');
        submit_btn.removeAttribute('hidden');
        var name_label = document.getElementById('name_label');
        name_label.removeAttribute('hidden');
        }
    })
    showdoa.addEventListener("click", function(){
        showform.setAttribute("hidden", "true");
        var gotodoas = document.getElementById("gotodoas");
        gotodoas.setAttribute("hidden", "true")
        var form = document.getElementById("form");
        form.removeAttribute("hidden");
    })