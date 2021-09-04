 function render_carousel(data, handle = false) {
    let lang = data.language;
    let defImage = `<img class="img-fluid carousel-image"
     src="${hupa_starter.admin_url}assets/images/hupa-logo.svg"
     alt=""
     width="200">`;
    let selectCaptionBG = '';
    let selectSelectorBG = '';
    let html = '<div id="accordionSliderParent">';
    for (const [key, val] of Object.entries(data.record)) {

     html += `
    <div id="carousel${val.id}" class="my-4">
    <div class="card shadow">
    <h5 class="d-flex card-header carousel-header py-4 carousel-box-bg-header">${val.bezeichnung}
    <span class="ms-auto">
    <i data-bs-id="${val.id}" data-bs-method="delete_carousel_item" data-bs-type="carousel" 
    data-bs-toggle="modal" 
    data-bs-target="#ThemeBSModal" 
    class="btn-trash-icon text-danger fa fa-trash-o"></i>
    </span>
    </h5>
    <div class="card-body">
    <div class="d-flex align-items-center">
    <div class="header">
    <h6 class="card-title">Shortcode: <b class="font-blue">[carousel id=${val.id}]</b></h6>
    </div>
    </div>
    </div>
    <div class="card-footer py-3 mt-auto carousel-box-bg-footer">
    <button data-site="${lang.btn_carousel_settings}" onclick="change_collapse_btn(this);"
    class="btn-collapse btn btn-hupa btn-outline-secondary"
    data-bs-toggle="collapse" data-bs-target="#carouselSettings${val.id}">
    <i class="fa fa-gears"></i>&nbsp; ${lang.btn_carousel_settings}
    </button>
    <button data-site="${lang.btn_slider_settings}" onclick="change_collapse_btn(this);"
    class="btn-collapse btn btn-hupa btn-outline-secondary"
    data-bs-toggle="collapse" data-bs-target="#sliderSettings${val.id}">
    <i class="fa fa-exchange"></i>&nbsp; ${lang.btn_slider_settings}
    </button>
    </div>

    <div class="collapse" id="carouselSettings${val.id}" data-bs-parent="#theme-carousel-data">
    <div class="container">
    <form class="sendAjaxCarouselForm" action="#" method="post">
    <input type="hidden" name="method" value="update_carousel">
    <input type="hidden" name="id" value="${val.id}">
    <h5 class="card-title py-2"><i
    class="font-blue fa fa-gears"></i>&nbsp; ${lang.title_carousel_options}
    <small class="small text-muted">( ID: ${val.id} )</small></h5>
    
    <div class="row row-cols-1 row-cols-lg-2 py-2 settings-box option first-box align-items-center">
    <div class="col">
    <div class="col-xl-8 col-lg-8 col-12 p-2">
    <div class="mb-3">
    <label for="inputBezeichnung${val.id}"
    class="form-label">${lang.lbl_bezeichnung}</label>
    <input name="bezeichnung" type="text" class="form-control" 
    onkeyup="changeCarouselTitle(this, ${val.id});"
    value="${val.bezeichnung}"
    id="inputBezeichnung${val.id}">
    </div>
    </div>
    </div>
    <div class="col">
    <small class="small d-block p-2">${lang.help_bezeichnung}</small>
    </div>
    </div>
    
    
    <div class="row row-cols-1 row-cols-lg-2 py-2 settings-box option first-box align-items-center">
    <div class="col">
    <div class="col-xl-8 col-lg-8 col-12 p-2">
    <div class="mb-3">
    <label for="inputContainerHeight${val.id}"
    class="form-label">${lang.lbl_container_height}</label>
    <input name="container_height" type="text" class="form-control" 
    value="${val.container_height}"
    id="inputContainerHeight${val.id}">
    </div>
    </div>
    </div>
    <div class="col">
    <small class="small d-block p-2">${lang.help_container_height}</small>
    </div>
    </div>
    
    <div class="row row-cols-1 row-cols-lg-2 py-2 settings-box option first-box align-items-center">
    <div class="col">
    <div class="col-xl-6 col-lg-8 col-12 p-2">
    <div class="mb-3">
    <label for="selectCarouselAnimation${val.id}"
    class="form-label">${lang.animation}</label>
    <select id="selectCarouselAnimation${val.id}" class="form-select"
    name="data_animate">
    <option value="1" ${val.data_animate === '1' ? ' selected' : ''}>slide</option>
    <option value="2" ${val.data_animate === '2' ? ' selected' : ''}>fade</option>
    </select>
    </div>
    </div>
    </div>
    <div class="col">
    <small class="small d-block p-2">${lang.animation_help}</small>
    </div>
    </div>
    
    <div class="row row-cols-1 row-cols-lg-2 py-2 settings-box option first-box align-items-center">
    <div class="col">
    <div class="col-xl-6 col-lg-8 col-12 p-2">
    <div class="mb-3">
    <label for="selectCaptionBg${val.id}"
    class="form-label">${lang.lbl_caption_bg}</label>
    <select id="selectCaptionBg${val.id}" class="form-select"
    name="caption_bg">`;

       for (const [keyCaptionBG, valCaptionBG] of Object.entries(data.select_bg)) {

            val.caption_bg === keyCaptionBG ? selectCaptionBG = 'selected' : selectCaptionBG = '';
            html += `<option value="${keyCaptionBG}" ${selectCaptionBG}>${valCaptionBG} </option>`;
        }

    html += `</select>
    </div>
    </div>
    </div>
    <div class="col">
    <small class="small d-block p-2">${lang.help_caption_bg}</small>
    </div>
    </div>
        
    <div class="row row-cols-1 row-cols-lg-2 py-2 settings-box option first-box align-items-center">
    <div class="col">
    <div class="col-xl-6 col-lg-8 col-12 p-2">
    <div class="mb-3">
    <label for="selectSelectorBg${val.id}"
    class="form-label">${lang.lbl_selector_bg}</label>
    <select id="selectSelectorBg${val.id}" class="form-select"
    name="select_bg">`;
        for (const [keySelectorBG, valSelectorBG] of Object.entries(data.select_bg)) {

            val.select_bg === keySelectorBG ? selectSelectorBG = 'selected' : selectSelectorBG = '';
            html += `<option value="${keySelectorBG}" ${selectSelectorBG}>${valSelectorBG} </option>`;
        }
    html += `</select>
    </div>
    </div>
    </div>
    <div class="col">
    <small class="small d-block p-2">${lang.help_selector_bg}</small>
    </div>
    </div>
        
    <div class="row row-cols-1 row-cols-lg-2 py-2 settings-box option align-items-center">
    <div class="col">
    <div class="col-xl-6 col-lg-8 col-12 p-2">
    <div class="form-check form-switch py-3">
    <input class="form-check-input" name="margin_aktiv" type="checkbox"
    id="checkTopMargin${val.id}" ${val.margin_aktiv ? 'checked' : ''}>
    <label class="form-check-label"
    for="checkTopMargin${val.id}">${lang.lbl_margin_aktiv}</label>
    </div>
    </div>
    </div>
    <div class="col">
    <small class="small d-block p-2">
    ${lang.help_margin_aktiv}
    </small>
    </div>
    </div>
        
    <div class="row row-cols-1 row-cols-lg-2 py-2 settings-box option align-items-center">
    <div class="col">
    <div class="col-xl-6 col-lg-8 col-12 p-2">
    <div class="form-check form-switch py-3">
    <input class="form-check-input" name="full_width" type="checkbox"
    id="checkFullWidth${val.id}" ${val.full_width ? 'checked' : ''}>
    <label class="form-check-label"
    for="checkFullWidth${val.id}">${lang.lbl_full_width}</label>
    </div>
    </div>
    </div>
    <div class="col">
    <small class="small d-block p-2">
    ${lang.help_full_width}
    </small>
    </div>
    </div>
       
    <div class="row row-cols-1 row-cols-lg-2 py-2 settings-box option align-items-center">
    <div class="col">
    <div class="col-xl-6 col-lg-8 col-12 p-2">
    <div class="form-check form-switch py-3">
    <input class="form-check-input" name="controls" type="checkbox"
    id="checkControls${val.id}" ${val.controls ? 'checked' : ''}>
    <label class="form-check-label"
    for="checkControls${val.id}">${lang.lbl_controls}</label>
    </div>
    </div>
    </div>
    <div class="col">
    <small class="small d-block p-2">
    ${lang.help_controls}
    </small>
    </div>
    </div>
    <div class="row row-cols-1 row-cols-lg-2 py-2 settings-box option align-items-center">
    <div class="col">
    <div class="col-xl-6 col-lg-8 col-12 p-2">
    <div class="form-check form-switch py-3">
    <input class="form-check-input" name="indicator" type="checkbox"
    id="checkIndicator${val.id}" ${val.indicator ? 'checked' : ''}>
    <label class="form-check-label"
    for="checkIndicator${val.id}">${lang.lbl_indicator}</label>
    </div>
    </div>
    </div>
    <div class="col">
    <small class="small d-block p-2">
    ${lang.help_indicator}
    </small>
    </div>
    </div>
    <div class="row row-cols-1 row-cols-lg-2 py-2 settings-box option align-items-center">
    <div class="col">
    <div class="col-xl-6 col-lg-8 col-12 p-2">
    <div class="form-check form-switch py-3">
    <input class="form-check-input" name="data_autoplay" type="checkbox"
    id="checkAutoplay${val.id}" ${val.data_autoplay ? 'checked' : ''}>
    <label class="form-check-label"
    for="checkAutoplay${val.id}">${lang.lbl_autoplay}</label>
    </div>
    </div>
    </div>
    <div class="col">
    <small class="small d-block p-2">
    ${lang.help_autoplay}
    </small>
    </div>
    </div>
    </form>
    </div>
     </div>
    <div class="collapse" id="sliderSettings${val.id}" data-bs-parent="#theme-carousel-data"> 
        <div class="add-wrapper">
        <button onclick="add_carousel_slider(this, '${val.id}')" class="btn btn-blue btn-sm ms-1 my-2">
        <i class="fa fa-plus "></i>&nbsp; ${lang.btn_add_slider} 
        </button>
        
        </div> `;
        html += render_slider_items(val.slider,lang, val.id, data);
        html += ` </div>
    </div>
    </div>`;
    }
    html += '</div>';
    let tempId = document.getElementById("theme-carousel-data");
     tempId.insertAdjacentHTML('afterbegin', html);
}

function render_slider_items(slider, lang, id, record, method = '' ) {
    let firstSelector = '';
    let secondSelector = '';
    let firstFontFamilySelect = '';
    let secondFontFamilySelect = '';
    let firstFontStyleSelect = '';
    let secondFontStyleSelect = '';
    let firstAnimationSelect = '';
    let firstAniValue = '';
    let firstAniClass = '';
    let secondAnimationSelect = '';
    let secondAniValue = '';
    let secondAniClass = '';

    let showDelBtn = '';
    let showAddBtn = '';
    let defImage = `<img class="img-fluid carousel-image"
     src="${hupa_starter.admin_url}assets/images/hupa-logo.svg"
     alt=""
     width="200">`;
    let html = '';
    if(method !== 'add') {
         html += `<div class="accordion sliderSortable" >`;
    }
    let i = 0;
    for (const [key, val] of Object.entries(slider)) {

    let random = createRandomCode(5);
    let cid = id+'_'+val.id;
      html += `
     <div id="sliderWrapper${cid}" class="sliderWrapper wrapper${id} sort${cid}">
     <div class="accordion-item shadow">
     <form class="sendAjaxCarouselForm" action="#" method="post">
     <input type="hidden" name="method" value="update_slider">
     <input type="hidden" name="id" value="${cid}">
     <h2 class="accordion-header">
     <span class="sliderHandle">
     <i class="sortableArrow fa fa-arrows"></i> `;

         html += `<i data-bs-id="${cid}" data-bs-method="delete_carousel_item" data-bs-type="slider" 
        data-bs-toggle="modal" 
        data-bs-target="#ThemeBSModal"  
        class="text-danger fa fa-trash">
      </i>`;
     html += '<i class ="fa fa-trash hide cursor-default"></i>';

     html += `</span>
     <button onclick="accordion_slider_handle(this, '${cid}');" class="accordion-button collapsed border bg-custom-gray"
     type="button"
     data-bs-toggle="collapse"
     data-bs-target="#collapseSlider${cid}" aria-expanded="false"
     aria-controls="collapseSlider${cid}">
     <b>Carousel:</b>&nbsp;<span class="carouselName">${val.carousel}</span>&nbsp; -> &nbsp; <b>ID:</b>&nbsp; ${val.id}
     </button>
     
     </h2>
     <div id="collapseSlider${cid}" class="accordion-collapse collapse "
     aria-labelledby="collapseSlider${cid}"
     data-bs-parent="#accordionSliderParent">
     <div class="border rounded mt-1 shadow-sm p-4 bg-custom-gray">
     <div class="row row-cols-1 row-cols-lg-2 py-2 settings-box option first-box align-items-center">
     <div class="col">
     <div class="col-xl-6 col-lg-8 col-12 p-2">
     <div class="mb-3">
     <div id="imageContainer${random}">`;

       if(val.img){
           html += `${val.img}`;
           showAddBtn = 'd-none';
           showDelBtn = '';
       } else {
           html += `${defImage}`;
           showAddBtn = '';
           showDelBtn = 'd-none';
       }

      html += `
    </div><!--imageContainer-->
    <button id="btn-add${random}" type="button" onclick="add_slider_img(this, '${random}');" class="${showAddBtn} btn btn-outline-secondary btn-sm d-block mx-auto mt-4">
     <i class="fa fa-image"></i>
     &nbsp; ${lang.btn_select_img}
     </button>
     
     <button id="btn-delete${random}" type="button" onclick="delete_slider_img(this, '${random}');" class="${showDelBtn} btn btn-outline-danger btn-sm d-block mx-auto mt-4">
     <i class="fa fa-trash"></i>
     &nbsp; ${lang.btn_delete_img}
     </button>
     <input id="inputID${random}" type="hidden" name="img_id" value="${val.img_id}">
     
     </div>
     </div>
     </div>
     <div class="col">
     <small class="small d-block p-2">${lang.btn_select_img_help}</small>
     </div>
     </div>

     <div class="row row-cols-1 row-cols-lg-2 py-2 settings-box option align-items-center">
     <div class="col">
     <div class="col-xl-6 col-lg-8 col-12 p-2">
     <div class="form-check form-switch py-3">
     <input class="form-check-input" name="aktiv"
     type="checkbox"
     id="checkAktiv${cid}" ${val.aktiv ? 'checked' : ''}>
     <label class="form-check-label"
     for="checkAktiv${cid}">${lang.lbl_active}</label>
     </div>
     </div>
     </div>
     <div class="col">
     <small class="small d-block p-2">${lang.help_active}</small>
     </div>
     </div>
     <div class="row row-cols-1 row-cols-lg-2 py-2 settings-box option align-items-center">
     <div class="col">
     <div class="col-xl-6 col-lg-8 col-12 p-2">
     <div class="mb-3">
     <label for="inputInterval${cid}"
     class="form-label">${lang.lbl_interval}
     <small class="small">(msec)</small>
     </label>
     <input type="number" value="${val.data_interval}" class="form-control"
     name="data_interval" id="inputInterval${cid}">
     </div>
     </div>
     </div>
     <div class="col">
     <small class="small d-block p-2">${lang.help_interval}
     </small>
     </div>
     </div>
     <div class="row row-cols-1 row-cols-lg-2 py-2 settings-box option align-items-center">
     <div class="col">
     <div class="col-12 p-2">
     <div class="mb-3">
     <label for="inputAlt${cid}"
     class="form-label">${lang.lbl_alt}
     </label>
     <input type="text" class="form-control" value="${val.data_alt}" name="data_alt"
     id="inputAlt${cid}">
     </div>
     </div>
     </div>
     <div class="col">
     <small class="small d-block p-2">${lang.help_alt}</small>
     </div>
     </div>

     <div class="row row-cols-1 row-cols-lg-2 py-2 settings-box option align-items-center">
     <div class="col">
     <div class="col-xl-6 col-lg-8 col-12 p-2">
     <div class="form-check form-switch py-3">
     <input class="form-check-input" name="caption_aktiv"
     type="checkbox"
     id="checkCaptionAktiv${cid}" ${val.caption_aktiv ? 'checked' : ''}>
     <label class="form-check-label"
     for="checkCaptionAktiv${cid}">${lang.lbl_caption}</label>
     </div>
     </div>
     </div>
     <div class="col">
     <small class="small d-block p-2">${lang.help_caption}></small>
     </div>
     </div>
     <div class="row row-cols-1 row-cols-lg-2 py-4 settings-box option align-items-center">
     <div class="col">
     <div class="col-xl-6 col-lg-8 col-12 p-2">
     <div class="d-flex align-items-center">
     <div class="input-color-container">
     <input id="InputFontColor${cid}"
     value="${val.font_color}"
     name="font_color"
     class="input-color" type="color">
     </div>
     <label class="input-color-label ms-2"
     for="InputFontColor${cid}">
     ${lang.lbl_color}
     </label>
     </div>
     </div>
     </div>
     <div class="col">
     <small class="small d-block p-2">${lang.help_color}</small>
     </div>
     </div>
     <div class="row settings-box option first-box  align-items-center">
     <h5 class=" px-3 py-3 mb-0 shadow border-tb bg-accordion-gray"><i
     class="font-blue fa fa-header"></i>&nbsp;
     ${lang.h5_headline}
     </h5>
     <div class="col-xl-6 col-lg-12 px-2">
     <div class="my-2 px-2">
     <label for="firstCaptionText${cid}" class="form-label pt-3">
     ${lang.lbl_first_caption}
     </label>
     <textarea name="first_caption" class="form-control"
     id="firstCaptionText${cid}" rows="2">${val.first_caption}</textarea>
     </div>
     </div>
     <div class="d-lg-flex d-md-block p-2">
     <div class="col-xl-2 col-lg-4 col-md-8 col-12 px-2">
     <label for="selectFirstSelector${cid}"
     class="form-label">${lang.lbl_selector}</label>
     <select id="selectFirstSelector${cid}"
     class="form-select"
     name="first_selector">`;

        for (const [keySelector, valSelector] of Object.entries(record.selector)) {

            val.first_selector === keySelector ? firstSelector = 'selected' : firstSelector = '';
            html += `<option value="${keySelector}" ${firstSelector}>${valSelector} </option>`;
        }

     html += `</select>
     </div>
     </div>
     <div class="col-xl-6 col-lg-12 col-12 p-2">
     <div class="my-2 px-2">
     <label for="firstCss${cid}" class="form-label">
     ${lang.lbl_extra_css}
     </label>
     <input type="text" name="first_css" class="form-control" value="${val.first_css}"
     id="firstCss${cid}">
     </div>
     </div>
     <div class="row row-cols-1 row-cols-lg-2 p-2">
     <div class="d-lg-flex col-md-block">
     <div class="col-xl-6 col-lg-12 col-12 p-2">
     <label for="selectFirstFont${cid}"
     class="form-label">${lang.lbl_font_family}</label>
     <select id="selectFirstFont${cid}" class="form-select"
     onchange="font_family_change(this, 'selectFirstStyle${cid}');"
     name="first_font"> `;
        for (const [firstFamKey, firstFamVal] of Object.entries(record.familySelect)) {
            val.first_font == firstFamVal.family ? firstFontFamilySelect = 'selected' : firstFontFamilySelect = '';
            html += `<option value="${firstFamVal.family}" ${firstFontFamilySelect}>${firstFamVal.family} </option>`;
        }

     html += `</select>
     </div>
     <div class="col-xl-6 col-lg-12 col-12 p-2">
     <label for="selectFirstStyle${cid}"
     class="form-label">${lang.lbl_font_style}</label>
     <select id="selectFirstStyle${cid}" class="form-select"
     name="first_style">`;

        for (const [firstStyleKey, firstStyleVal] of Object.entries(val.first_style_select)) {
            val.first_style == firstStyleKey ? firstFontStyleSelect = 'selected' : firstFontStyleSelect = '';
            html += `<option value="${firstStyleKey}" ${firstFontStyleSelect}>${firstStyleVal} </option>`;
        }

        let aniFirstRandom = createRandomCode(5);
     html += `</select>
     </div>
     </div>
     </div>
     <hr>
     <div class="col-lg-6 p-3">
     <div id="first-font-size${cid}" class="p-2">
     <label for="RangeFontFirstSize${cid}"
     class="form-label"><b>${lang.lbl_font_size}
     <span class="show-range-value">${val.first_size}</span>
     (Px)</b></label>
     <input data-container="first-font-size${cid}" type="range"
     name="first_size" class="form-range sizeRange"
     min="10"
     max="100" step="1"
     value="${val.first_size}"
     id="RangeFontFirstSize${cid}">
     </div>
     <div id="first-font-height${cid}" class="p-2">
     <label for="RangeFontFirstHeight${cid}"
     class="form-label"><b>${lang.lbl_font_height}
     <span class="show-range-value">${val.first_height}</span></b>
     </label>
     <input data-container="first-font-height${cid}" type="range"
     class="form-range sizeRange" name="first_height"
     min="0"
     max="5"
     value="${val.first_height}"
     step="0.1" id="RangeFontFirstHeight${cid}">
     </div>
     <div class="col-xl-6 col-lg-12 col-12 p-2">
     <label for="selectFirstAni${cid}"
     class="form-label">${lang.lbl_ani}</label>
     <select id="selectFirstAni${cid}"
     onchange="change_animate_select('${aniFirstRandom}', this)"
     class="form-select"
     name="first_ani">
     <option value="">${lang.lbl_select}
     ...
     </option>`;

        for (const [firstAniKey, firstAniVal] of Object.entries(record.animate)) {

            if(firstAniVal.divider){
                firstAniClass = " disabled class=\"SelectSeparator\"";
                firstAniValue = firstAniVal.value;
            } else {
                firstAniClass = "";
                firstAniValue = firstAniVal.animate;
            }
            val.first_ani == firstAniVal.animate ? firstAnimationSelect = 'selected' : firstAnimationSelect = '';
            html += `<option value="${firstAniValue}" ${firstAniClass} ${firstAnimationSelect}>${firstAniVal.animate} </option>`;
        }

     html += `</select>
     <span id="ani_preview${aniFirstRandom}"
     class="hide ani_preview ps-2 pt-3 fs-6 d-inline-block text-danger"><b>animate</b></span>
     </div>
     </div>
     </div>
     <div class="row settings-box option first-box  align-items-center">
     <h5 class="px-3 py-3 shadow bg-accordion-gray border-tb"><i
     class="font-blue fa fa-text-width"></i>&nbsp;
     ${lang.h5_baseline}
     </h5>
     <div class="col-xl-6 col-lg-12 px-2">
     <div class="my-2 px-2">
     <label for="secondCaptionText${cid}" class="form-label pt-3">
     ${lang.lbl_baseline_txt}
     </label>
     <textarea name="second_caption" class="form-control"
     id="secondCaptionText${cid}" rows="2">${val.second_caption}</textarea>
     </div>
     </div>
     <div class="d-lg-flex d-md-block">
     <div class="col-xl-6 col-lg-12 col-12 px-2 mb-2">
     <label for="secondCss${cid}" class="form-label pt-3">
     ${lang.lbl_extra_css}
     </label>
     <input type="text" name="second_css" value="${val.second_css}"
     class="form-control" id="secondCss${cid}">
     </div>
     </div>

     <div class="row row-cols-1 row-cols-lg-2 p-2">
     <div class="d-lg-flex col-md-block">
     <div class="col-xl-6 col-lg-12 col-12 p-2">
     <label for="selectSecondFont${cid}"
     class="form-label">${lang.lbl_font_family}</label>
     <select id="selectSecondFont${cid}" class="form-select"
     onchange="font_family_change(this, 'selectSecondStyle${cid}');"
     name="second_font">`;

        for (const [secondFamKey, secondFamVal] of Object.entries(record.familySelect)) {
            val.second_font == secondFamVal.family ? secondFontFamilySelect = 'selected' : secondFontFamilySelect = '';
            html += `<option value="${secondFamVal.family}" ${secondFontFamilySelect}>${secondFamVal.family} </option>`;
        }

     html += `</select>
     </div>
     <div class="col-xl-6 col-lg-12 col-12 p-2">
     <label for="selectSecondStyle${cid}"
     class="form-label">${lang.lbl_font_style}</label>
     <select id="selectSecondStyle${cid}" class="form-select"
     name="second_style">`;

        for (const [secondStyleKey, secondStyleVal] of Object.entries(val.second_style_select)) {
            val.second_style == secondStyleKey ? secondFontStyleSelect = 'selected' : secondFontStyleSelect = '';
            html += `<option value="${secondStyleKey}" ${secondFontStyleSelect}>${secondStyleVal} </option>`;
        }

        let aniSecondRandom = createRandomCode(5);
     html += `</select>
     </div>
     </div>
     </div>
     <hr>
     <div class="col-lg-6 p-3">
     <div id="second-font-size${cid}" class="p-2">
     <label for="RangeFontSecondSize${cid}"
     class="form-label"><b>${lang.lbl_font_size}
     <span class="show-range-value">${val.second_size}</span>
     (Px)</b></label>
     <input data-container="second-font-size${cid}" type="range"
     name="second_size" class="form-range sizeRange"
     min="10"
     max="100" step="1"
     value="${val.second_size}"
     id="RangeFontSecondSize${cid}">
     </div>
     <div id="second-font-height${cid}" class="p-2">
     <label for="RangeFontSecondHeight${cid}"
     class="form-label"><b>${lang.lbl_font_height}
     <span class="show-range-value">${val.second_height}</span></b>
     </label>
     <input data-container="second-font-height${cid}" type="range"
     class="form-range sizeRange" name="second_height"
     min="0"
     max="5"
     value="${val.second_height}"
     step="0.1" id="RangeFontSecondHeight${cid}">
     </div>
     <div class="col-xl-6 col-lg-12 col-12 p-2">
     <label for="selectSecondAni${cid}"
     class="form-label">${lang.lbl_ani}</label>
     <select id="selectSecondAni${cid}"
     class="form-select animateSelect"
     onchange="change_animate_select('${aniSecondRandom}', this)"
     name="second_ani">
     <option value="">${lang.lbl_select}
     ...
     </option>`;

        for (const [secondAniKey, secondAniVal] of Object.entries(record.animate)) {

            if(secondAniVal.divider){
                secondAniClass = " disabled class=\"SelectSeparator\"";
                secondAniValue = secondAniVal.value;
            } else {
                secondAniClass = "";
                secondAniValue = secondAniVal.animate;
            }
            val.second_ani == secondAniVal.animate ? secondAnimationSelect = 'selected' : secondAnimationSelect = '';
            html += `<option value="${secondAniValue}" ${secondAniClass} ${secondAnimationSelect}>${secondAniVal.animate} </option>`;
        }

     html += `</select>
     <span id="ani_preview${aniSecondRandom}"
     class="hide ani_preview ps-2 pt-3 fs-6 d-inline-block text-danger"><b>animate</b></span>
     </div>
     </div>
     </div>
     </div>
     </div>
     </form>
     </div><!--item-->
     </div>
     `;
        i++;
    }
    if(method !== 'add') {
        html += `</div>`;
    }

    if(method === 'add'){
        let carouselWrapper = document.querySelector("#sliderSettings"+id + ' .sliderSortable');
        carouselWrapper.insertAdjacentHTML('afterbegin', html);
        return false;
    }
    return html;
}


