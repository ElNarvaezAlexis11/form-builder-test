export const selector = (component) =>{
    let inputSearchSelector = document.getElementById('painter_select_search');
    inputSearchSelector.addEventListener('keydown',e =>{
        component.set('searchPainterTo',e.target.value);
    });
};