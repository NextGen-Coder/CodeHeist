// let proLanguageSelect = document.getElementById('prolang');
let editor = ace.edit("editor");
let edit = document.getElementById('editor');
let editMenu = document.getElementById('editor-menu');
let runBtn = document.getElementById('run');
let proLanguageSelect = document.getElementById('language');
let codeDiv = document.getElementById('code-edit');
let hiddenCode = document.getElementById('hiddencode');
let form = document.getElementById('editorForm');

editor.setOptions({
    autoScrollEditorIntoView: false,
    copyWithEmptySelection: true,
});

//default values for editor
editor.setTheme("../ace/theme/dracula");

// language changer for editor
if(proLanguageSelect.value=='c'||proLanguageSelect.value=='cpp') {
    editor.session.setMode("ace/mode/c_cpp");
} else {
    editor.session.setMode("ace/mode/"+proLanguageSelect.value);
}

if(proLanguageSelect.value=='javascript')
    editor.setValue(`console.log('Hello World');`);

if(proLanguageSelect.value=='java')
    editor.setValue(`public class MainClass {
public static void main(String[] Args) {
    System.out.println("Hello World");
}
}`);

if(proLanguageSelect.value=='python')
    editor.setValue(`print 'Hello World'`);

if(proLanguageSelect.value=='c')
    editor.setValue(`#include <stdio.h>\n
int main() {
    printf("%s","Hello World");
    return 0;
}`);
    
if(proLanguageSelect.value=='cpp')
    editor.setValue(`#include <iostream>\n
using namespace std;
int main() {
    cout<<"Hello World";
    return 0;
}`);
        
form.addEventListener("submit", () => {
    var code1 = editor.getValue();
    hiddenCode.value = code1;
});