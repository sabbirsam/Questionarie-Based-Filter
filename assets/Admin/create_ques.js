/*
console.log('This is drag and drop utility');

const imgBox = document.querySelector('.imgBox');
const whiteBoxes = document.getElementsByClassName('whiteBox');

// Event listeners for draggable element imgBox
imgBox.addEventListener('dragstart', (e) => {
    console.log('DragStart has been triggered');
    e.target.className += ' hold';
    setTimeout(() => {
        e.target.className = 'hide';
    }, 0);

});

imgBox.addEventListener('dragend', (e) => {
    console.log('DragEnd has been triggered');
    e.target.className = 'imgBox';
});

for (whiteBox of whiteBoxes) {
    whiteBox.addEventListener('dragover', (e) => {
        e.preventDefault();
        console.log('DragOver has been triggered');
    });

    whiteBox.addEventListener('dragenter', (e) => {
        console.log('DragEnter has been triggered');
        e.target.className += ' dashed';
    })

    whiteBox.addEventListener('dragleave', (e) => {
        console.log('DragLeave has been triggered');
        e.target.className = 'whiteBox'
    })

    whiteBox.addEventListener('drop', (e) => {
        console.log('Drop has been triggered');
        e.target.append(imgBox);
    })
}*/


/**

 [
 {
    "type": "autocomplete",
    "required": false,
    "label": "Autocomplete",
    "className": "form-control",
    "name": "autocomplete-1618503339326",
    "access": false,
    "requireValidOption": false,
    "values": [
      {
        "label": "Option 1",
        "value": "option-1",
        "selected": true
      },
      {
        "label": "Option 2",
        "value": "option-2",
        "selected": false
      },
      {
        "label": "Option 3",
        "value": "option-3",
        "selected": false
      }
    ]
  },
 {
    "type": "button",
    "label": "Button",
    "subtype": "button",
    "className": "btn-default btn",
    "name": "button-1618503342426",
    "access": false,
    "style": "default"
  },
 {
    "type": "checkbox-group",
    "required": false,
    "label": "Checkbox Group",
    "toggle": false,
    "inline": false,
    "name": "checkbox-group-1618503345174",
    "access": false,
    "other": false,
    "values": [
      {
        "label": "Option 1",
        "value": "option-1",
        "selected": true
      }
    ]
  },
 {
    "type": "date",
    "required": false,
    "label": "Date Field",
    "className": "form-control",
    "name": "date-1618503347923",
    "access": false
  },
 {
    "type": "date",
    "required": false,
    "label": "Date Field",
    "className": "form-control",
    "name": "date-1618503351042",
    "access": false
  },
 {
    "type": "file",
    "required": false,
    "label": "File Upload",
    "className": "form-control",
    "name": "file-1618503353922",
    "access": false,
    "subtype": "file",
    "multiple": false
  },
 {
    "type": "header",
    "subtype": "h1",
    "label": "Header",
    "access": false
  },
 {
    "type": "hidden",
    "name": "hidden-1618503359936",
    "access": false
  },
 {
    "type": "number",
    "required": false,
    "label": "Number",
    "className": "form-control",
    "name": "number-1618503362988",
    "access": false
  },
 {
    "type": "radio-group",
    "required": false,
    "label": "Radio Group",
    "inline": false,
    "name": "radio-group-1618503369551",
    "access": false,
    "other": false,
    "values": [
      {
        "label": "Option 1",
        "value": "option-1",
        "selected": false
      },
      {
        "label": "Option 2",
        "value": "option-2",
        "selected": false
      },
      {
        "label": "Option 3",
        "value": "option-3",
        "selected": false
      }
    ]
  },
 {
    "type": "paragraph",
    "subtype": "p",
    "label": "Paragraph",
    "access": false
  },
 {
    "type": "select",
    "required": false,
    "label": "Select",
    "className": "form-control",
    "name": "select-1618503373302",
    "access": false,
    "multiple": false,
    "values": [
      {
        "label": "Option 1",
        "value": "option-1",
        "selected": true
      },
      {
        "label": "Option 2",
        "value": "option-2",
        "selected": false
      },
      {
        "label": "Option 3",
        "value": "option-3",
        "selected": false
      }
    ]
  },
 {
    "type": "text",
    "required": false,
    "label": "Text Field",
    "className": "form-control",
    "name": "text-1618503376302",
    "access": false,
    "subtype": "text"
  },
 {
    "type": "textarea",
    "required": false,
    "label": "Text Area",
    "className": "form-control",
    "name": "textarea-1618503379083",
    "access": false,
    "subtype": "textarea"
  }
 ]
 * @param ev
 */



function allowDrop(ev) {
    ev.preventDefault();
}

function drag(ev) {
    ev.dataTransfer.setData("text", ev.target.id);
}

function drop(ev) {
    ev.preventDefault();
    var data = ev.dataTransfer.getData("text");
    ev.target.appendChild(document.getElementById(data));
}
