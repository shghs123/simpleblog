$(function() {
    initSelect2();
    subscribeAddNewTagEvent()
    subscribeRemoveNewTagEvent()
    subscribeFormSubmitEvent()
});

function initSelect2() {
    $('.multi-selector').select2({
        tags: true,
        placeholder: 'Start type to find tags..',
        createTag: function (params) {
            var term = $.trim(params.term);

            if (term === '') {
              return null;
            }

            return {
              id: term,
              text: term,
              newTag: true
            }
          }
    });
}

let newTags= [];
function subscribeAddNewTagEvent() {
    $('.multi-selector').on('select2:select', function (e) {
        let data = e.params.data;

        if(data.newTag) {
            newTags.push(data.text);
        }
    });
}

function subscribeRemoveNewTagEvent() {
    $('.multi-selector').on('select2:unselect', function (e) {
        let data = e.params.data;

        if(data.newTag) {
            const index = newTags.indexOf(data.text);
            if (index > -1) {
                newTags.splice(index, 1);
            }
        }
    });
}

function subscribeFormSubmitEvent() {
    $("#post-creation-form").on('submit', function(e) {
        newTags.forEach(function(item) {
            $("<input />").attr("type", "hidden")
            .attr("name", "newTags[]")
            .attr("value", item)
            .appendTo("#post-creation-form");
        })

        return true;
    });
}
