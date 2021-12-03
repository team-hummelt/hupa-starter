document.addEventListener("DOMContentLoaded", function (event) {

    let themeSortable = document.querySelectorAll("table.wp-list-table #the-list");
    if (themeSortable) {
        let sortNodes = Array.prototype.slice.call(themeSortable, 0);
        sortNodes.forEach(function (sortNodes) {
            sortNodes.classList.add('hupa-sortable');

            let elementArray = [];
            const sortable = Sortable.create(sortNodes, {
                animation: 300,
                handle: "tr",
                ghostClass: 'sortable-ghost',
                forceFallback: true,
                scroll: true,
                bubbleScroll: true,
                scrollSensitivity: 150,
                easing: "cubic-bezier(0.4, 0.0, 0.2, 1)",
                scrollSpeed: 20,
                emptyInsertThreshold: 5,
                onMove: function (evt) {
                    // return evt.related.className.indexOf('adminBox') === -1;
                },
                onUpdate: function (evt) {
                    elementArray = [];
                    evt.to.childNodes.forEach(themeSortable => {
                        if (themeSortable.nodeName == 'TR' ) {
                            elementArray.push(themeSortable.id);
                        }
                    });

                    let paged = get_site_params('paged');
                    if(typeof paged === 'undefined' || !paged) {
                        paged = 1;
                    }

                    let xhr = new XMLHttpRequest();
                    xhr.open('POST', sort_ajax_obj.ajax_url, true);
                    let formData = new FormData();
                    formData.append('method', 'hupa_post_order');
                    formData.append('post_type', sort_ajax_obj.post_type );
                    formData.append('paged', paged);
                    formData.append('_ajax_nonce', sort_ajax_obj.nonce);
                    formData.append('action', 'HupaStarterAjax');
                    formData.append('elements', elementArray);
                    xhr.send(formData);
                    //Response
                    xhr.onreadystatechange = function () {
                        if (this.readyState === 4 && this.status === 200) {
                            let data = JSON.parse(this.responseText);

                        }
                    };
                }
            });
        });
    }

    function get_site_params(search = false, input_url = false) {
        let get_url;
        let get_search;
        input_url ? get_url = input_url : get_url = window.location.href;
        search ? get_search = search : get_search = 'page';
        let url = new URL(get_url);
        return url.searchParams.get(get_search);
    }
});