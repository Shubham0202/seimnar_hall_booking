const dashItem = document.querySelectorAll(".dash-items");

// dashItem.forEach(itm=>{itm.classList.add("transition-all","duration-300");});
dashItem.forEach((item)=>{
    item.addEventListener("click",()=>{
        dashItem.forEach(itm=>{itm.classList.remove("bg-black","text-white");itm.classList.add("hover:bg-slate-50");});
        item.classList.add("bg-black","text-white");
        item.classList.remove("hover:bg-slate-50");
    });
});