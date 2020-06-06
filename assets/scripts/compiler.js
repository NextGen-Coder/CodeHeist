let proLanguageSelect = document.getElementById('prolang');
let themeSelect = document.getElementById('theme');
let editor = ace.edit("editor");
let edit = document.getElementById('editor');
let editMenu = document.getElementById('editor-menu');
let runBtn = document.getElementById('run');
let screenBtn = document.getElementById('screen');
let screenImg = document.getElementById('screen-img');
let codeDiv = document.getElementById('code-edit');
let hiddenCode = document.getElementById('hiddencode');
let form = document.getElementById('editorForm');

editor.setOptions({
    autoScrollEditorIntoView: true,
    copyWithEmptySelection: true,
    enableBasicAutocompletion: true,
    enableSnippets: true,
    enableLiveAutocompletion: true
});


//default values for editor
editor.setTheme("../ace/theme/cobalt");

// editor.setTheme("../ace/theme/tomorrow_night_blue");
editor.session.setMode("ace/mode/"+proLanguageSelect.value);
editor.setValue(`public class MainClass {
    public static void main(String[] Args) {
        System.out.println('Hello World');
    }
}`);

// language changer for editor
proLanguageSelect.addEventListener('change', () => {
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
        System.out.println('Hello World');
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
        
});