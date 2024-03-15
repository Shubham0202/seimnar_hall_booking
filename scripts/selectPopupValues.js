window.addEventListener("load",()=>{
    const popUps = document.querySelector(".allPopUps");
    let popUpsInp = document.querySelector(".popup-inputs");
    const departmentName = document.querySelectorAll('.department');
    const departmentwrapper = document.querySelectorAll('.department-wrapper');
    // console.log(departmentName);
    setTimeout(()=>{
        console.log('fetch')
        popUpsInp = document.querySelector(".popup-inputs");
        console.log(departmentName);
    },500)
    // checks only if we are clicking on the input tag 
    document.addEventListener('click',(e)=>{
        console.log(e.target.classList.contains("popup-inputs"));
        (e.target.classList.contains("popup-inputs"))?popUps.classList.remove('hidden'):popUps.classList.add('hidden');
    });
    
    // search department name
    popUpsInp.addEventListener('input',()=>{
        departmentName.forEach((name,index)=>{
            let n= name.innerHTML.toLowerCase();
            if(n.includes(popUpsInp.value))
            {
                departmentwrapper[index].classList.remove('hidden');
            }
            else
            {
                departmentwrapper[index].classList.add('hidden');
            }
  
        });
    });

    // add deparment name into the input tag
   departmentName.forEach(name=>{
    name.addEventListener('click',()=>{
             console.log("click");
            popUpsInp.value=name.innerHTML;
        });
   });
   
});
