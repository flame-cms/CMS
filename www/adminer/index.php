<?php
/** Adminer - Compact database management
* @link http://www.adminer.org/
* @author Jakub Vrana, http://www.vrana.cz/
* @copyright 2007 Jakub Vrana
* @license http://www.apache.org/licenses/LICENSE-2.0 Apache License, Version 2.0
* @license http://www.gnu.org/licenses/gpl-2.0.html GNU General Public License, version 2 (one or other)
* @version 3.4.0
*/error_reporting(6135);$cc=!ereg('^(unsafe_raw)?$',ini_get("filter.default"));if($cc||ini_get("filter.default_flags")){foreach(array('_GET','_POST','_COOKIE','_SERVER')as$W){$Tf=filter_input_array(constant("INPUT$W"),FILTER_UNSAFE_RAW);if($Tf)$$W=$Tf;}}if(isset($_GET["file"])){header("Expires: ".gmdate("D, d M Y H:i:s",time()+365*24*60*60)." GMT");if($_GET["file"]=="favicon.ico"){header("Content-Type: image/x-icon");echo
base64_decode("AAABAAEAEBAQAAEABAAoAQAAFgAAACgAAAAQAAAAIAAAAAEABAAAAAAAwAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAA////AAAA/wBhTgAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAERERAAAAAAETMzEQAAAAATERExAAAAABMRETEAAAAAExERMQAAAAATERExAAAAABMRETEAAAAAEzMzMREREQATERExEhEhABEzMxEhEREAAREREhERIRAAAAARIRESEAAAAAESEiEQAAAAABEREQAAAAAAAAAAD//9UAwP/VAIB/AACAf/AAgH+kAIB/gACAfwAAgH8AAIABAACAAf8AgAH/AMAA/wD+AP8A/wAIAf+B1QD//9UA");}elseif($_GET["file"]=="default.css"){header("Content-Type: text/css; charset=utf-8");echo'body{color:#000;background:#fff;font:90%/1.25 Verdana,Arial,Helvetica,sans-serif;margin:0;}a{color:blue;}a:visited{color:navy;}a:hover{color:red;}a.text{text-decoration:none;}h1{font-size:150%;margin:0;padding:.8em 1em;border-bottom:1px solid #999;font-weight:normal;color:#777;background:#eee;}h2{font-size:150%;margin:0 0 20px -18px;padding:.8em 1em;border-bottom:1px solid #000;color:#000;font-weight:normal;background:#ddf;}h3{font-weight:normal;font-size:130%;margin:1em 0 0;}form{margin:0;}table{margin:1em 20px 0 0;border:0;border-top:1px solid #999;border-left:1px solid #999;font-size:90%;}td,th{border:0;border-right:1px solid #999;border-bottom:1px solid #999;padding:.2em .3em;}th{background:#eee;text-align:left;}thead th{text-align:center;}thead td,thead th{background:#ddf;}fieldset{display:inline;vertical-align:top;padding:.5em .8em;margin:.8em .5em 0 0;border:1px solid #999;}p{margin:.8em 20px 0 0;}img{vertical-align:middle;border:0;}td img{max-width:200px;max-height:200px;}code{background:#eee;}tbody tr:hover td,tbody tr:hover th{background:#eee;}pre{margin:1em 0 0;}input[type=image]{vertical-align:middle;}.version{color:#777;font-size:67%;}.js .hidden,.nojs .jsonly{display:none;}.nowrap td,.nowrap th,td.nowrap{white-space:pre;}.wrap td{white-space:normal;}.error{color:red;background:#fee;}.error b{background:#fff;font-weight:normal;}.message{color:green;background:#efe;}.error,.message{padding:.5em .8em;margin:1em 20px 0 0;}.char{color:#007F00;}.date{color:#7F007F;}.enum{color:#007F7F;}.binary{color:red;}.odd td{background:#F5F5F5;}.js .checked td,.js .checked th{background:#ddf;}.time{color:silver;font-size:70%;}.function{text-align:right;}.number{text-align:right;}.datetime{text-align:right;}.type{width:15ex;width:auto\\9;}.options select{width:20ex;width:auto\\9;}.active{font-weight:bold;}.sqlarea{width:98%;}#menu{position:absolute;margin:10px 0 0;padding:0 0 30px 0;top:2em;left:0;width:19em;overflow:auto;overflow-y:hidden;white-space:nowrap;}#menu p{padding:.8em 1em;margin:0;border-bottom:1px solid #ccc;}#content{margin:2em 0 0 21em;padding:10px 20px 20px 0;}#lang{position:absolute;top:0;left:0;line-height:1.8em;padding:.3em 1em;}#breadcrumb{white-space:nowrap;position:absolute;top:0;left:21em;background:#eee;height:2em;line-height:1.8em;padding:0 1em;margin:0 0 0 -18px;}#h1{color:#777;text-decoration:none;font-style:italic;}#version{font-size:67%;color:red;}#schema{margin-left:60px;position:relative;-moz-user-select:none;-webkit-user-select:none;}#schema .table{border:1px solid silver;padding:0 2px;cursor:move;position:absolute;}#schema .references{position:absolute;}.rtl h2{margin:0 -18px 20px 0;}.rtl p,.rtl table,.rtl .error,.rtl .message{margin:1em 0 0 20px;}.rtl #content{margin:2em 21em 0 0;padding:10px 0 20px 20px;}.rtl #breadcrumb{left:auto;right:21em;margin:0 -18px 0 0;}.rtl #lang,.rtl #menu{left:auto;right:0;}@media print{#lang,#menu{display:none;}#content{margin-left:1em;}#breadcrumb{left:1em;}.nowrap td,.nowrap th,td.nowrap{white-space:normal;}}';}elseif($_GET["file"]=="functions.js"){header("Content-Type: text/javascript; charset=utf-8");?>function
toggle(id){var
el=document.getElementById(id);el.className=(el.className=='hidden'?'':'hidden');return true;}function
cookie(assign,days){var
date=new
Date();date.setDate(date.getDate()+days);document.cookie=assign+'; expires='+date;}function
verifyVersion(){cookie('adminer_version=0',1);var
script=document.createElement('script');script.src=location.protocol+'//www.adminer.org/version.php';document.body.appendChild(script);}function
selectValue(select){var
selected=select.options[select.selectedIndex];return((selected.attributes.value||{}).specified?selected.value:selected.text);}function
trCheck(el){var
tr=el.parentNode.parentNode;tr.className=tr.className.replace(/(^|\s)checked(\s|$)/,'$2')+(el.checked?' checked':'');}function
formCheck(el,name){var
elems=el.form.elements;for(var
i=0;i<elems.length;i++){if(name.test(elems[i].name)){elems[i].checked=el.checked;trCheck(elems[i]);}}}function
tableCheck(){var
tables=document.getElementsByTagName('table');for(var
i=0;i<tables.length;i++){if(/(^|\s)checkable(\s|$)/.test(tables[i].className)){var
trs=tables[i].getElementsByTagName('tr');for(var
j=0;j<trs.length;j++){trCheck(trs[j].firstChild.firstChild);}}}}function
formUncheck(id){var
el=document.getElementById(id);el.checked=false;trCheck(el);}function
formChecked(el,name){var
checked=0;var
elems=el.form.elements;for(var
i=0;i<elems.length;i++){if(name.test(elems[i].name)&&elems[i].checked){checked++;}}return checked;}function
tableClick(event){var
click=(!window.getSelection||getSelection().isCollapsed);var
el=event.target||event.srcElement;while(!/^tr$/i.test(el.tagName)){if(/^(table|a|input|textarea)$/i.test(el.tagName)){if(el.type!='checkbox'){return;}checkboxClick(event,el);click=false;}el=el.parentNode;}el=el.firstChild.firstChild;if(click){el.click&&el.click();el.onclick&&el.onclick();}trCheck(el);}var
lastChecked;function
checkboxClick(event,el){if(!el.name){return;}if(event.shiftKey&&(!lastChecked||lastChecked.name==el.name)){var
checked=(lastChecked?lastChecked.checked:true);var
inputs=el.parentNode.parentNode.parentNode.getElementsByTagName('input');var
checking=!lastChecked;for(var
i=0;i<inputs.length;i++){var
input=inputs[i];if(input.name===el.name){if(checking){input.checked=checked;trCheck(input);}if(input===el||input===lastChecked){if(checking){break;}checking=true;}}}}lastChecked=el;}function
setHtml(id,html){var
el=document.getElementById(id);if(el){if(html==undefined){el.parentNode.innerHTML='&nbsp;';}else{el.innerHTML=html;}}}function
nodePosition(el){var
pos=0;while(el=el.previousSibling){pos++;}return pos;}function
pageClick(href,page,event){if(!isNaN(page)&&page){href+=(page!=1?'&page='+(page-1):'');location.href=href;}}function
selectAddRow(field){field.onchange=function(){selectFieldChange(field.form);};field.onchange();var
row=field.parentNode.cloneNode(true);var
selects=row.getElementsByTagName('select');for(var
i=0;i<selects.length;i++){selects[i].name=selects[i].name.replace(/[a-z]\[\d+/,'$&1');selects[i].selectedIndex=0;}var
inputs=row.getElementsByTagName('input');if(inputs.length){inputs[0].name=inputs[0].name.replace(/[a-z]\[\d+/,'$&1');inputs[0].value='';inputs[0].className='';}field.parentNode.parentNode.appendChild(row);}function
selectFieldChange(form){var
ok=(function(){var
inputs=form.getElementsByTagName('input');for(var
i=0;i<inputs.length;i++){var
input=inputs[i];if(/^fulltext/.test(input.name)&&input.value){return true;}}var
ok=true;var
selects=form.getElementsByTagName('select');for(var
i=0;i<selects.length;i++){var
select=selects[i];var
col=selectValue(select);var
match=/^(where.+)col\]/.exec(select.name);if(match){var
op=selectValue(form[match[1]+'op]']);var
val=form[match[1]+'val]'].value;if(col
in
indexColumns&&(!/LIKE|REGEXP/.test(op)||(op=='LIKE'&&val.charAt(0)!='%'))){return true;}else
if(col||val){ok=false;}}if(col&&/^order/.test(select.name)){if(!(col
in
indexColumns)){ok=false;}break;}}return ok;})();setHtml('noindex',(ok?'':'!'));}function
bodyKeydown(event,button){var
target=event.target||event.srcElement;if(event.ctrlKey&&(event.keyCode==13||event.keyCode==10)&&!event.altKey&&!event.metaKey&&/select|textarea|input/i.test(target.tagName)){target.blur();if(button){target.form[button].click();}else{target.form.submit();}return false;}return true;}function
editingKeydown(event){if((event.keyCode==40||event.keyCode==38)&&event.ctrlKey&&!event.altKey&&!event.metaKey){var
target=event.target||event.srcElement;var
sibling=(event.keyCode==40?'nextSibling':'previousSibling');var
el=target.parentNode.parentNode[sibling];if(el&&(/^tr$/i.test(el.tagName)||(el=el[sibling]))&&/^tr$/i.test(el.tagName)&&(el=el.childNodes[nodePosition(target.parentNode)])&&(el=el.childNodes[nodePosition(target)])){el.focus();}return false;}if(event.shiftKey&&!bodyKeydown(event,'insert')){eventStop(event);return false;}return true;}function
functionChange(select){var
input=select.form[select.name.replace(/^function/,'fields')];if(selectValue(select)){if(input.origMaxLength===undefined){input.origMaxLength=input.maxLength;}input.removeAttribute('maxlength');}else
if(input.origMaxLength>=0){input.maxLength=input.origMaxLength;}}function
ajax(url,callback,data){var
request=(window.XMLHttpRequest?new
XMLHttpRequest():(window.ActiveXObject?new
ActiveXObject('Microsoft.XMLHTTP'):false));if(request){request.open((data?'POST':'GET'),url);if(data){request.setRequestHeader('Content-Type','application/x-www-form-urlencoded');}request.setRequestHeader('X-Requested-With','XMLHttpRequest');request.onreadystatechange=function(){if(request.readyState==4){callback(request);}};request.send(data);}return request;}function
ajaxSetHtml(url){return ajax(url,function(request){if(request.status){var
data=eval('('+request.responseText+')');for(var
key
in
data){setHtml(key,data[key]);}}});}function
selectDblClick(td,event,text){if(/input|textarea/i.test(td.firstChild.tagName)){return;}var
original=td.innerHTML;var
input=document.createElement(text?'textarea':'input');input.onkeydown=function(event){if(!event){event=window.event;}if(event.keyCode==27&&!(event.ctrlKey||event.shiftKey||event.altKey||event.metaKey)){td.innerHTML=original;}};var
pos=event.rangeOffset;var
value=td.firstChild.alt||td.textContent||td.innerText;input.style.width=Math.max(td.clientWidth-14,20)+'px';if(text){var
rows=1;value.replace(/\n/g,function(){rows++;});input.rows=rows;}if(value=='\u00A0'||td.getElementsByTagName('i').length){value='';}if(document.selection){var
range=document.selection.createRange();range.moveToPoint(event.clientX,event.clientY);var
range2=range.duplicate();range2.moveToElementText(td);range2.setEndPoint('EndToEnd',range);pos=range2.text.length;}td.innerHTML='';td.appendChild(input);input.focus();if(text==2){return ajax(location.href+'&'+encodeURIComponent(td.id)+'=',function(request){if(request.status){input.value=request.responseText;input.name=td.id;}});}input.value=value;input.name=td.id;input.selectionStart=pos;input.selectionEnd=pos;if(document.selection){var
range=document.selection.createRange();range.moveEnd('character',-input.value.length+pos);range.select();}}function
eventStop(event){if(event.stopPropagation){event.stopPropagation();}else{event.cancelBubble=true;}}var
jushRoot=location.protocol + '//www.adminer.org/static/';function
bodyLoad(version){if(jushRoot){var
link=document.createElement('link');link.rel='stylesheet';link.type='text/css';link.href=jushRoot+'jush.css';document.getElementsByTagName('head')[0].appendChild(link);var
script=document.createElement('script');script.src=jushRoot+'jush.js';script.onload=function(){if(window.jush){jush.create_links=' target="_blank" rel="noreferrer"';jush.urls.sql_sqlset=jush.urls.sql[0]=jush.urls.sqlset[0]=jush.urls.sqlstatus[0]='http://dev.mysql.com/doc/refman/'+version+'/en/$key';var
pgsql='http://www.postgresql.org/docs/'+version+'/static/';jush.urls.pgsql_pgsqlset=jush.urls.pgsql[0]=pgsql+'$key';jush.urls.pgsqlset[0]=pgsql+'runtime-config-$key.html#GUC-$1';if(window.jushLinks){jush.custom_links=jushLinks;}jush.highlight_tag('code',0);}};script.onreadystatechange=function(){if(/^(loaded|complete)$/.test(script.readyState)){script.onload();}};document.body.appendChild(script);}}function
formField(form,name){for(var
i=0;i<form.length;i++){if(form[i].name==name){return form[i];}}}function
typePassword(el,disable){try{el.type=(disable?'text':'password');}catch(e){}}function
loginDriver(driver){var
trs=driver.parentNode.parentNode.parentNode.rows;for(var
i=1;i<trs.length-1;i++){trs[i].className=(/sqlite/.test(driver.value)?'hidden':'');}}function
textareaKeydown(target,event){if(!event.shiftKey&&!event.altKey&&!event.ctrlKey&&!event.metaKey){if(event.keyCode==9){if(target.setSelectionRange){var
start=target.selectionStart;var
scrolled=target.scrollTop;target.value=target.value.substr(0,start)+'\t'+target.value.substr(target.selectionEnd);target.setSelectionRange(start+1,start+1);target.scrollTop=scrolled;return false;}else
if(target.createTextRange){document.selection.createRange().text='\t';return false;}}if(event.keyCode==27){var
els=target.form.elements;for(var
i=1;i<els.length;i++){if(els[i-1]==target){els[i].focus();break;}}return false;}}return true;}var
added='.',rowCount;function
delimiterEqual(val,a,b){return(val==a+'_'+b||val==a+b||val==a+b.charAt(0).toUpperCase()+b.substr(1));}function
idfEscape(s){return s.replace(/`/,'``');}function
editingNameChange(field){var
name=field.name.substr(0,field.name.length-7);var
type=formField(field.form,name+'[type]');var
opts=type.options;var
candidate;var
val=field.value;for(var
i=opts.length;i--;){var
match=/(.+)`(.+)/.exec(opts[i].value);if(!match){if(candidate&&i==opts.length-2&&val==opts[candidate].value.replace(/.+`/,'')&&name=='fields[1]'){return;}break;}var
table=match[1];var
column=match[2];var
tables=[table,table.replace(/s$/,''),table.replace(/es$/,'')];for(var
j=0;j<tables.length;j++){table=tables[j];if(val==column||val==table||delimiterEqual(val,table,column)||delimiterEqual(val,column,table)){if(candidate){return;}candidate=i;break;}}}if(candidate){type.selectedIndex=candidate;type.onchange();}}function
editingAddRow(button,allowed,focus){if(allowed&&rowCount>=allowed){return false;}var
match=/(\d+)(\.\d+)?/.exec(button.name);var
x=match[0]+(match[2]?added.substr(match[2].length):added)+'1';var
row=button.parentNode.parentNode;var
row2=row.cloneNode(true);var
tags=row.getElementsByTagName('select');var
tags2=row2.getElementsByTagName('select');for(var
i=0;i<tags.length;i++){tags2[i].name=tags[i].name.replace(/([0-9.]+)/,x);tags2[i].selectedIndex=tags[i].selectedIndex;}tags=row.getElementsByTagName('input');tags2=row2.getElementsByTagName('input');var
input=tags2[0];for(var
i=0;i<tags.length;i++){if(tags[i].name=='auto_increment_col'){tags2[i].value=x;tags2[i].checked=false;}tags2[i].name=tags[i].name.replace(/([0-9.]+)/,x);if(/\[(orig|field|comment|default)/.test(tags[i].name)){tags2[i].value='';}if(/\[(has_default)/.test(tags[i].name)){tags2[i].checked=false;}}tags[0].onchange=function(){editingNameChange(tags[0]);};row.parentNode.insertBefore(row2,row.nextSibling);if(focus){input.onchange=function(){editingNameChange(input);};input.focus();}added+='0';rowCount++;return true;}function
editingRemoveRow(button){var
field=formField(button.form,button.name.replace(/drop_col(.+)/,'fields$1[field]'));field.parentNode.removeChild(field);button.parentNode.parentNode.style.display='none';return true;}var
lastType='';function
editingTypeChange(type){var
name=type.name.substr(0,type.name.length-6);var
text=selectValue(type);for(var
i=0;i<type.form.elements.length;i++){var
el=type.form.elements[i];if(el.name==name+'[length]'&&!((/(char|binary)$/.test(lastType)&&/(char|binary)$/.test(text))||(/(enum|set)$/.test(lastType)&&/(enum|set)$/.test(text)))){el.value='';}if(lastType=='timestamp'&&el.name==name+'[has_default]'&&/timestamp/i.test(formField(type.form,name+'[default]').value)){el.checked=false;}if(el.name==name+'[collation]'){el.className=(/(char|text|enum|set)$/.test(text)?'':'hidden');}if(el.name==name+'[unsigned]'){el.className=(/(int|float|double|decimal)$/.test(text)?'':'hidden');}if(el.name==name+'[on_delete]'){el.className=(/`/.test(text)?'':'hidden');}}}function
editingLengthFocus(field){var
td=field.parentNode;if(/(enum|set)$/.test(selectValue(td.previousSibling.firstChild))){var
edit=document.getElementById('enum-edit');var
val=field.value;edit.value=(/^'.+','.+'$/.test(val)?val.substr(1,val.length-2).replace(/','/g,"\n").replace(/''/g,"'"):val);td.appendChild(edit);field.style.display='none';edit.style.display='inline';edit.focus();}}function
editingLengthBlur(edit){var
field=edit.parentNode.firstChild;var
val=edit.value;field.value=(/\n/.test(val)?"'"+val.replace(/\n+$/,'').replace(/'/g,"''").replace(/\n/g,"','")+"'":val);field.style.display='inline';edit.style.display='none';}function
columnShow(checked,column){var
trs=document.getElementById('edit-fields').getElementsByTagName('tr');for(var
i=0;i<trs.length;i++){trs[i].getElementsByTagName('td')[column].className=(checked?'':'hidden');}}function
partitionByChange(el){var
partitionTable=/RANGE|LIST/.test(selectValue(el));el.form['partitions'].className=(partitionTable||!el.selectedIndex?'hidden':'');document.getElementById('partition-table').className=(partitionTable?'':'hidden');}function
partitionNameChange(el){var
row=el.parentNode.parentNode.cloneNode(true);row.firstChild.firstChild.value='';el.parentNode.parentNode.parentNode.appendChild(row);el.onchange=function(){};}function
foreignAddRow(field){field.onchange=function(){};var
row=field.parentNode.parentNode.cloneNode(true);var
selects=row.getElementsByTagName('select');for(var
i=0;i<selects.length;i++){selects[i].name=selects[i].name.replace(/\]/,'1$&');selects[i].selectedIndex=0;}field.parentNode.parentNode.parentNode.appendChild(row);}function
indexesAddRow(field){field.onchange=function(){};var
parent=field.parentNode.parentNode;var
row=parent.cloneNode(true);var
selects=row.getElementsByTagName('select');for(var
i=0;i<selects.length;i++){selects[i].name=selects[i].name.replace(/indexes\[\d+/,'$&1');selects[i].selectedIndex=0;}var
inputs=row.getElementsByTagName('input');for(var
i=0;i<inputs.length;i++){inputs[i].name=inputs[i].name.replace(/indexes\[\d+/,'$&1');inputs[i].value='';}parent.parentNode.appendChild(row);}function
indexesChangeColumn(field,prefix){var
columns=field.parentNode.parentNode.getElementsByTagName('select');var
names=[];for(var
i=0;i<columns.length;i++){var
value=selectValue(columns[i]);if(value){names.push(value);}}field.form[field.name.replace(/\].*/,'][name]')].value=prefix+names.join('_');}function
indexesAddColumn(field,prefix){field.onchange=function(){indexesChangeColumn(field,prefix);};var
select=field.form[field.name.replace(/\].*/,'][type]')];if(!select.selectedIndex){select.selectedIndex=3;select.onchange();}var
column=field.parentNode.cloneNode(true);select=column.getElementsByTagName('select')[0];select.name=select.name.replace(/\]\[\d+/,'$&1');select.selectedIndex=0;var
input=column.getElementsByTagName('input')[0];input.name=input.name.replace(/\]\[\d+/,'$&1');input.value='';field.parentNode.parentNode.appendChild(column);field.onchange();}var
that,x,y;function
schemaMousedown(el,event){if((event.which?event.which:event.button)==1){that=el;x=event.clientX-el.offsetLeft;y=event.clientY-el.offsetTop;}}function
schemaMousemove(ev){if(that!==undefined){ev=ev||event;var
left=(ev.clientX-x)/em;var
top=(ev.clientY-y)/em;var
divs=that.getElementsByTagName('div');var
lineSet={};for(var
i=0;i<divs.length;i++){if(divs[i].className=='references'){var
div2=document.getElementById((/^refs/.test(divs[i].id)?'refd':'refs')+divs[i].id.substr(4));var
ref=(tablePos[divs[i].title]?tablePos[divs[i].title]:[div2.parentNode.offsetTop/em,0]);var
left1=-1;var
id=divs[i].id.replace(/^ref.(.+)-.+/,'$1');if(divs[i].parentNode!=div2.parentNode){left1=Math.min(0,ref[1]-left)-1;divs[i].style.left=left1+'em';divs[i].getElementsByTagName('div')[0].style.width=-left1+'em';var
left2=Math.min(0,left-ref[1])-1;div2.style.left=left2+'em';div2.getElementsByTagName('div')[0].style.width=-left2+'em';}if(!lineSet[id]){var
line=document.getElementById(divs[i].id.replace(/^....(.+)-.+$/,'refl$1'));var
top1=top+divs[i].offsetTop/em;var
top2=top+div2.offsetTop/em;if(divs[i].parentNode!=div2.parentNode){top2+=ref[0]-top;line.getElementsByTagName('div')[0].style.height=Math.abs(top1-top2)+'em';}line.style.left=(left+left1)+'em';line.style.top=Math.min(top1,top2)+'em';lineSet[id]=true;}}}that.style.left=left+'em';that.style.top=top+'em';}}function
schemaMouseup(ev,db){if(that!==undefined){ev=ev||event;tablePos[that.firstChild.firstChild.firstChild.data]=[(ev.clientY-y)/em,(ev.clientX-x)/em];that=undefined;var
s='';for(var
key
in
tablePos){s+='_'+key+':'+Math.round(tablePos[key][0]*10000)/10000+'x'+Math.round(tablePos[key][1]*10000)/10000;}s=encodeURIComponent(s.substr(1));var
link=document.getElementById('schema-link');link.href=link.href.replace(/[^=]+$/,'')+s;cookie('adminer_schema-'+db+'='+s,30);}}<?php
}else{header("Content-Type: image/gif");switch($_GET["file"]){case"plus.gif":echo
base64_decode("R0lGODdhEgASAKEAAO7u7gAAAJmZmQAAACwAAAAAEgASAAACIYSPqcvtD00I8cwqKb5v+q8pIAhxlRmhZYi17iPE8kzLBQA7");break;case"cross.gif":echo
base64_decode("R0lGODdhEgASAKEAAO7u7gAAAJmZmQAAACwAAAAAEgASAAACI4SPqcvtDyMKYdZGb355wy6BX3dhlOEx57FK7gtHwkzXNl0AADs=");break;case"up.gif":echo
base64_decode("R0lGODdhEgASAKEAAO7u7gAAAJmZmQAAACwAAAAAEgASAAACIISPqcvtD00IUU4K730T9J5hFTiKEXmaYcW2rgDH8hwXADs=");break;case"down.gif":echo
base64_decode("R0lGODdhEgASAKEAAO7u7gAAAJmZmQAAACwAAAAAEgASAAACIISPqcvtD00I8cwqKb5bV/5cosdMJtmcHca2lQDH8hwXADs=");break;case"arrow.gif":echo
base64_decode("R0lGODlhCAAKAIAAAICAgP///yH5BAEAAAEALAAAAAAIAAoAAAIPBIJplrGLnpQRqtOy3rsAADs=");break;}}exit;}function
connection(){global$g;return$g;}function
adminer(){global$b;return$b;}function
idf_unescape($r){$Rc=substr($r,-1);return
str_replace($Rc.$Rc,$Rc,substr($r,1,-1));}function
escape_string($W){return
substr(q($W),1,-1);}function
remove_slashes($ue,$cc=false){if(get_magic_quotes_gpc()){while(list($v,$W)=each($ue)){foreach($W
as$Nc=>$V){unset($ue[$v][$Nc]);if(is_array($V)){$ue[$v][stripslashes($Nc)]=$V;$ue[]=&$ue[$v][stripslashes($Nc)];}else$ue[$v][stripslashes($Nc)]=($cc?$V:stripslashes($V));}}}}function
bracket_escape($r,$Aa=false){static$Hf=array(':'=>':1',']'=>':2','['=>':3');return
strtr($r,($Aa?array_flip($Hf):$Hf));}function
h($M){return
htmlspecialchars(str_replace("\0","",$M),ENT_QUOTES);}function
nbsp($M){return(trim($M)!=""?h($M):"&nbsp;");}function
nl_br($M){return
str_replace("\n","<br>",$M);}function
checkbox($_,$X,$La,$Pc="",$Hd="",$Mc=false){static$q=0;$q++;$G="<input type='checkbox' name='$_' value='".h($X)."'".($La?" checked":"").($Hd?' onclick="'.h($Hd).'"':'').($Mc?" class='jsonly'":"")." id='checkbox-$q'>";return($Pc!=""?"<label for='checkbox-$q'>$G".h($Pc)."</label>":$G);}function
optionlist($Ld,$Te=null,$Yf=false){$G="";foreach($Ld
as$Nc=>$V){$Md=array($Nc=>$V);if(is_array($V)){$G.='<optgroup label="'.h($Nc).'">';$Md=$V;}foreach($Md
as$v=>$W)$G.='<option'.($Yf||is_string($v)?' value="'.h($v).'"':'').(($Yf||is_string($v)?(string)$v:$W)===$Te?' selected':'').'>'.h($W);if(is_array($V))$G.='</optgroup>';}return$G;}function
html_select($_,$Ld,$X="",$Gd=true){if($Gd)return"<select name='".h($_)."'".(is_string($Gd)?' onchange="'.h($Gd).'"':"").">".optionlist($Ld,$X)."</select>";$G="";foreach($Ld
as$v=>$W)$G.="<label><input type='radio' name='".h($_)."' value='".h($v)."'".($v==$X?" checked":"").">".h($W)."</label>";return$G;}function
confirm($cb=""){return" onclick=\"return confirm('".'Opravdu?'.($cb?" (' + $cb + ')":"")."');\"";}function
print_fieldset($q,$Wc,$eg=false,$Hd=""){echo"<fieldset><legend><a href='#fieldset-$q' onclick=\"".h($Hd)."return !toggle('fieldset-$q');\">$Wc</a></legend><div id='fieldset-$q'".($eg?"":" class='hidden'").">\n";}function
bold($Fa){return($Fa?" class='active'":"");}function
odd($G=' class="odd"'){static$p=0;if(!$G)$p=-1;return($p++%
2?$G:'');}function
js_escape($M){return
addcslashes($M,"\r\n'\\/");}function
json_row($v,$W=null){static$dc=true;if($dc)echo"{";if($v!=""){echo($dc?"":",")."\n\t\"".addcslashes($v,"\r\n\"\\").'": '.($W!==null?'"'.addcslashes($W,"\r\n\"\\").'"':'undefined');$dc=false;}else{echo"\n}\n";$dc=true;}}function
ini_bool($Ec){$W=ini_get($Ec);return(eregi('^(on|true|yes)$',$W)||(int)$W);}function
sid(){static$G;if($G===null)$G=(SID&&!($_COOKIE&&ini_bool("session.use_cookies")));return$G;}function
q($M){global$g;return$g->quote($M);}function
get_vals($E,$e=0){global$g;$G=array();$F=$g->query($E);if(is_object($F)){while($H=$F->fetch_row())$G[]=$H[$e];}return$G;}function
get_key_vals($E,$h=null){global$g;if(!is_object($h))$h=$g;$G=array();$F=$h->query($E);if(is_object($F)){while($H=$F->fetch_row())$G[$H[0]]=$H[1];}return$G;}function
get_rows($E,$h=null,$k="<p class='error'>"){global$g;$Ya=(is_object($h)?$h:$g);$G=array();$F=$Ya->query($E);if(is_object($F)){while($H=$F->fetch_assoc())$G[]=$H;}elseif(!$F&&!is_object($h)&&$k&&defined("PAGE_HEADER"))echo$k.error()."\n";return$G;}function
unique_array($H,$t){foreach($t
as$s){if(ereg("PRIMARY|UNIQUE",$s["type"])){$G=array();foreach($s["columns"]as$v){if(!isset($H[$v]))continue
2;$G[$v]=$H[$v];}return$G;}}$G=array();foreach($H
as$v=>$W){if(!preg_match('~^(COUNT\\((\\*|(DISTINCT )?`(?:[^`]|``)+`)\\)|(AVG|GROUP_CONCAT|MAX|MIN|SUM)\\(`(?:[^`]|``)+`\\))$~',$v))$G[$v]=$W;}return$G;}function
where($Z){global$u;$G=array();foreach((array)$Z["where"]as$v=>$W)$G[]=idf_escape(bracket_escape($v,1)).(($u=="sql"&&ereg('\\.',$W))||$u=="mssql"?" LIKE ".exact_value(addcslashes($W,"%_\\")):" = ".exact_value($W));foreach((array)$Z["null"]as$v)$G[]=idf_escape($v)." IS NULL";return
implode(" AND ",$G);}function
where_check($W){parse_str($W,$Ka);remove_slashes(array(&$Ka));return
where($Ka);}function
where_link($p,$e,$X,$Id="="){return"&where%5B$p%5D%5Bcol%5D=".urlencode($e)."&where%5B$p%5D%5Bop%5D=".urlencode(($X!==null?$Id:"IS NULL"))."&where%5B$p%5D%5Bval%5D=".urlencode($X);}function
cookie($_,$X){global$ba;$Zd=array($_,(ereg("\n",$X)?"":$X),time()+2592000,preg_replace('~\\?.*~','',$_SERVER["REQUEST_URI"]),"",$ba);if(version_compare(PHP_VERSION,'5.2.0')>=0)$Zd[]=true;return
call_user_func_array('setcookie',$Zd);}function
restart_session(){if(!ini_bool("session.use_cookies"))session_start();}function&get_session($v){return$_SESSION[$v][DRIVER][SERVER][$_GET["username"]];}function
set_session($v,$W){$_SESSION[$v][DRIVER][SERVER][$_GET["username"]]=$W;}function
auth_url($tb,$K,$U,$j=null){global$ub;preg_match('~([^?]*)\\??(.*)~',remove_from_uri(implode("|",array_keys($ub))."|username|".($j!==null?"db|":"").session_name()),$z);return"$z[1]?".(sid()?SID."&":"").($tb!="server"||$K!=""?urlencode($tb)."=".urlencode($K)."&":"")."username=".urlencode($U).($j!=""?"&db=".urlencode($j):"").($z[2]?"&$z[2]":"");}function
is_ajax(){return($_SERVER["HTTP_X_REQUESTED_WITH"]=="XMLHttpRequest");}function
redirect($ad,$ld=null){if($ld!==null){restart_session();$_SESSION["messages"][preg_replace('~^[^?]*~','',($ad!==null?$ad:$_SERVER["REQUEST_URI"]))][]=$ld;}if($ad!==null){if($ad=="")$ad=".";header("Location: $ad");exit;}}function
query_redirect($E,$ad,$ld,$ze=true,$Rb=true,$Yb=false){global$g,$k,$b;if($Rb)$Yb=!$g->query($E);$cf="";if($E)$cf=$b->messageQuery("$E;");if($Yb){$k=error().$cf;return
false;}if($ze)redirect($ad,$ld.$cf);return
true;}function
queries($E=null){global$g;static$xe=array();if($E===null)return
implode(";\n",$xe);$xe[]=(ereg(';$',$E)?"DELIMITER ;;\n$E;\nDELIMITER ":$E);return$g->query($E);}function
apply_queries($E,$Q,$Mb='table'){foreach($Q
as$O){if(!queries("$E ".$Mb($O)))return
false;}return
true;}function
queries_redirect($ad,$ld,$ze){return
query_redirect(queries(),$ad,$ld,$ze,false,!$ze);}function
remove_from_uri($Yd=""){return
substr(preg_replace("~(?<=[?&])($Yd".(SID?"":"|".session_name()).")=[^&]*&~",'',"$_SERVER[REQUEST_URI]&"),0,-1);}function
pagination($B,$hb){return" ".($B==$hb?$B+1:'<a href="'.h(remove_from_uri("page").($B?"&page=$B":"")).'">'.($B+1)."</a>");}function
get_file($v,$mb=false){$ac=$_FILES[$v];if(!$ac||$ac["error"])return$ac["error"];$G=file_get_contents($mb&&ereg('\\.gz$',$ac["name"])?"compress.zlib://$ac[tmp_name]":($mb&&ereg('\\.bz2$',$ac["name"])?"compress.bzip2://$ac[tmp_name]":$ac["tmp_name"]));if($mb){$df=substr($G,0,3);if(function_exists("iconv")&&ereg("^\xFE\xFF|^\xFF\xFE",$df,$Ee))$G=iconv("utf-16","utf-8",$G);elseif($df=="\xEF\xBB\xBF")$G=substr($G,3);}return$G;}function
upload_error($k){$jd=($k==UPLOAD_ERR_INI_SIZE?ini_get("upload_max_filesize"):0);return($k?'Nepodařilo se nahrát soubor.'.($jd?" ".sprintf('Maximální povolená velikost souboru je %sB.',$jd):""):'Soubor neexistuje.');}function
repeat_pattern($ge,$w){return
str_repeat("$ge{0,65535}",$w/65535)."$ge{0,".($w
%
65535)."}";}function
is_utf8($W){return(preg_match('~~u',$W)&&!preg_match('~[\\0-\\x8\\xB\\xC\\xE-\\x1F]~',$W));}function
shorten_utf8($M,$w=80,$jf=""){if(!preg_match("(^(".repeat_pattern("[\t\r\n -\x{FFFF}]",$w).")($)?)u",$M,$z))preg_match("(^(".repeat_pattern("[\t\r\n -~]",$w).")($)?)",$M,$z);return
h($z[1]).$jf.(isset($z[2])?"":"<i>...</i>");}function
friendly_url($W){return
preg_replace('~[^a-z0-9_]~i','-',$W);}function
hidden_fields($ue,$_c=array()){while(list($v,$W)=each($ue)){if(is_array($W)){foreach($W
as$Nc=>$V)$ue[$v."[$Nc]"]=$V;}elseif(!in_array($v,$_c))echo'<input type="hidden" name="'.h($v).'" value="'.h($W).'">';}}function
hidden_fields_get(){echo(sid()?'<input type="hidden" name="'.session_name().'" value="'.h(session_id()).'">':''),(SERVER!==null?'<input type="hidden" name="'.DRIVER.'" value="'.h(SERVER).'">':""),'<input type="hidden" name="username" value="'.h($_GET["username"]).'">';}function
column_foreign_keys($O){global$b;$G=array();foreach($b->foreignKeys($O)as$n){foreach($n["source"]as$W)$G[$W][]=$n;}return$G;}function
enum_input($S,$xa,$l,$X,$Eb=null){global$b;preg_match_all("~'((?:[^']|'')*)'~",$l["length"],$ed);$G=($Eb!==null?"<label><input type='$S'$xa value='$Eb'".((is_array($X)?in_array($Eb,$X):$X===0)?" checked":"")."><i>".'prázdné'."</i></label>":"");foreach($ed[1]as$p=>$W){$W=stripcslashes(str_replace("''","'",$W));$La=(is_int($X)?$X==$p+1:(is_array($X)?in_array($p+1,$X):$X===$W));$G.=" <label><input type='$S'$xa value='".($p+1)."'".($La?' checked':'').'>'.h($b->editVal($W,$l)).'</label>';}return$G;}function
input($l,$X,$o){global$T,$b,$u;$_=h(bracket_escape($l["field"]));echo"<td class='function'>";$Ge=($u=="mssql"&&$l["auto_increment"]);if($Ge&&!$_POST["save"])$o=null;$oc=(isset($_GET["select"])||$Ge?array("orig"=>'původní'):array())+$b->editFunctions($l);$xa=" name='fields[$_]'";if($l["type"]=="enum")echo
nbsp($oc[""])."<td>".$b->editInput($_GET["edit"],$l,$xa,$X);else{$dc=0;foreach($oc
as$v=>$W){if($v===""||!$W)break;$dc++;}$Gd=($dc?" onchange=\"var f = this.form['function[".h(js_escape(bracket_escape($l["field"])))."]']; if ($dc > f.selectedIndex) f.selectedIndex = $dc;\"":"");$xa.=$Gd;echo(count($oc)>1?html_select("function[$_]",$oc,$o===null||in_array($o,$oc)||isset($oc[$o])?$o:"","functionChange(this);"):nbsp(reset($oc))).'<td>';$Gc=$b->editInput($_GET["edit"],$l,$xa,$X);if($Gc!="")echo$Gc;elseif($l["type"]=="set"){preg_match_all("~'((?:[^']|'')*)'~",$l["length"],$ed);foreach($ed[1]as$p=>$W){$W=stripcslashes(str_replace("''","'",$W));$La=(is_int($X)?($X>>$p)&1:in_array($W,explode(",",$X),true));echo" <label><input type='checkbox' name='fields[$_][$p]' value='".(1<<$p)."'".($La?' checked':'')."$Gd>".h($b->editVal($W,$l)).'</label>';}}elseif(ereg('blob|bytea|raw|file',$l["type"])&&ini_bool("file_uploads"))echo"<input type='file' name='fields-$_'$Gd>";elseif(ereg('text|lob',$l["type"]))echo"<textarea ".($u!="sqlite"||ereg("\n",$X)?"cols='50' rows='12'":"cols='30' rows='1' style='height: 1.2em;'")."$xa>".h($X).'</textarea>';else{$kd=(!ereg('int',$l["type"])&&preg_match('~^(\\d+)(,(\\d+))?$~',$l["length"],$z)?((ereg("binary",$l["type"])?2:1)*$z[1]+($z[3]?1:0)+($z[2]&&!$l["unsigned"]?1:0)):($T[$l["type"]]?$T[$l["type"]]+($l["unsigned"]?0:1):0));echo"<input value='".h($X)."'".($kd?" maxlength='$kd'":"").(ereg('char|binary',$l["type"])&&$kd>20?" size='40'":"")."$xa>";}}}function
process_input($l){global$b;$r=bracket_escape($l["field"]);$o=$_POST["function"][$r];$X=$_POST["fields"][$r];if($l["type"]=="enum"){if($X==-1)return
false;if($X=="")return"NULL";return+$X;}if($l["auto_increment"]&&$X=="")return
null;if($o=="orig")return($l["on_update"]=="CURRENT_TIMESTAMP"?idf_escape($l["field"]):false);if($o=="NULL")return"NULL";if($l["type"]=="set")return
array_sum((array)$X);if(ereg('blob|bytea|raw|file',$l["type"])&&ini_bool("file_uploads")){$ac=get_file("fields-$r");if(!is_string($ac))return
false;return
q($ac);}return$b->processInput($l,$X,$o);}function
search_tables(){global$b,$g;$_GET["where"][0]["op"]="LIKE %%";$_GET["where"][0]["val"]=$_POST["query"];$jc=false;foreach(table_status()as$O=>$P){$_=$b->tableName($P);if(isset($P["Engine"])&&$_!=""&&(!$_POST["tables"]||in_array($O,$_POST["tables"]))){$F=$g->query("SELECT".limit("1 FROM ".table($O)," WHERE ".implode(" AND ",$b->selectSearchProcess(fields($O),array())),1));if($F->fetch_row()){if(!$jc){echo"<ul>\n";$jc=true;}echo"<li><a href='".h(ME."select=".urlencode($O)."&where[0][op]=".urlencode($_GET["where"][0]["op"])."&where[0][val]=".urlencode($_GET["where"][0]["val"]))."'>$_</a>\n";}}}echo($jc?"</ul>":"<p class='message'>".'Žádné tabulky.')."\n";}function
dump_headers($zc,$td=false){global$b;$G=$b->dumpHeaders($zc,$td);$Wd=$_POST["output"];if($Wd!="text")header("Content-Disposition: attachment; filename=".$b->dumpFilename($zc).".$G".($Wd!="file"&&!ereg('[^0-9a-z]',$Wd)?".$Wd":""));session_write_close();return$G;}function
dump_csv($H){foreach($H
as$v=>$W){if(preg_match("~[\"\n,;\t]~",$W)||$W==="")$H[$v]='"'.str_replace('"','""',$W).'"';}echo
implode(($_POST["format"]=="csv"?",":($_POST["format"]=="tsv"?"\t":";")),$H)."\r\n";}function
apply_sql_function($o,$e){return($o?($o=="unixepoch"?"DATETIME($e, '$o')":($o=="count distinct"?"COUNT(DISTINCT ":strtoupper("$o("))."$e)"):$e);}function
password_file(){$qb=ini_get("upload_tmp_dir");if(!$qb){if(function_exists('sys_get_temp_dir'))$qb=sys_get_temp_dir();else{$bc=@tempnam("","");if(!$bc)return
false;$qb=dirname($bc);unlink($bc);}}$bc="$qb/adminer.key";$G=@file_get_contents($bc);if($G)return$G;$lc=@fopen($bc,"w");if($lc){$G=md5(uniqid(mt_rand(),true));fwrite($lc,$G);fclose($lc);}return$G;}function
is_mail($Bb){$wa='[-a-z0-9!#$%&\'*+/=?^_`{|}~]';$sb='[a-z0-9]([-a-z0-9]{0,61}[a-z0-9])';$ge="$wa+(\\.$wa+)*@($sb?\\.)+$sb";return
preg_match("(^$ge(,\\s*$ge)*\$)i",$Bb);}function
is_url($M){$sb='[a-z0-9]([-a-z0-9]{0,61}[a-z0-9])';return(preg_match("~^(https?)://($sb?\\.)+$sb(:\\d+)?(/.*)?(\\?.*)?(#.*)?\$~i",$M,$z)?strtolower($z[1]):"");}global$b,$g,$ub,$_b,$Ib,$k,$oc,$tc,$ba,$Fc,$u,$ca,$Qc,$Fd,$hf,$R,$Jf,$T,$Vf,$ia;if(!$_SERVER["REQUEST_URI"])$_SERVER["REQUEST_URI"]=$_SERVER["ORIG_PATH_INFO"];if(!strpos($_SERVER["REQUEST_URI"],'?')&&$_SERVER["QUERY_STRING"]!="")$_SERVER["REQUEST_URI"].="?$_SERVER[QUERY_STRING]";$ba=$_SERVER["HTTPS"]&&strcasecmp($_SERVER["HTTPS"],"off");@ini_set("session.use_trans_sid",false);if(!defined("SID")){session_name("adminer_sid");$Zd=array(0,preg_replace('~\\?.*~','',$_SERVER["REQUEST_URI"]),"",$ba);if(version_compare(PHP_VERSION,'5.2.0')>=0)$Zd[]=true;call_user_func_array('session_set_cookie_params',$Zd);session_start();}remove_slashes(array(&$_GET,&$_POST,&$_COOKIE),$cc);if(function_exists("set_magic_quotes_runtime"))set_magic_quotes_runtime(false);@set_time_limit(0);@ini_set("zend.ze1_compatibility_mode",false);@ini_set("precision",20);function
get_lang(){return'cs';}function
lang($If,$_d){$je=($_d==1?0:($_d&&$_d<5?1:2));$If=str_replace("%d","%s",$If[$je]);$_d=number_format($_d,0,".",' ');return
sprintf($If,$_d);}if(extension_loaded('pdo')){class
Min_PDO
extends
PDO{var$_result,$server_info,$affected_rows,$error;function
__construct(){global$b;$je=array_search("",$b->operators);if($je!==false)unset($b->operators[$je]);}function
dsn($xb,$U,$C,$Qb='auth_error'){set_exception_handler($Qb);parent::__construct($xb,$U,$C);restore_exception_handler();$this->setAttribute(13,array('Min_PDOStatement'));$this->server_info=$this->getAttribute(4);}function
query($E,$Pf=false){$F=parent::query($E);if(!$F){$Kb=$this->errorInfo();$this->error=$Kb[2];return
false;}$this->store_result($F);return$F;}function
multi_query($E){return$this->_result=$this->query($E);}function
store_result($F=null){if(!$F)$F=$this->_result;if($F->columnCount()){$F->num_rows=$F->rowCount();return$F;}$this->affected_rows=$F->rowCount();return
true;}function
next_result(){$this->_result->_offset=0;return@$this->_result->nextRowset();}function
result($E,$l=0){$F=$this->query($E);if(!$F)return
false;$H=$F->fetch();return$H[$l];}}class
Min_PDOStatement
extends
PDOStatement{var$_offset=0,$num_rows;function
fetch_assoc(){return$this->fetch(2);}function
fetch_row(){return$this->fetch(3);}function
fetch_field(){$H=(object)$this->getColumnMeta($this->_offset++);$H->orgtable=$H->table;$H->orgname=$H->name;$H->charsetnr=(in_array("blob",(array)$H->flags)?63:0);return$H;}}}$ub=array();$ub["sqlite"]="SQLite 3";$ub["sqlite2"]="SQLite 2";if(isset($_GET["sqlite"])||isset($_GET["sqlite2"])){$me=array((isset($_GET["sqlite"])?"SQLite3":"SQLite"),"PDO_SQLite");define("DRIVER",(isset($_GET["sqlite"])?"sqlite":"sqlite2"));if(extension_loaded(isset($_GET["sqlite"])?"sqlite3":"sqlite")){if(isset($_GET["sqlite"])){class
Min_SQLite{var$extension="SQLite3",$server_info,$affected_rows,$error,$_link;function
Min_SQLite($bc){$this->_link=new
SQLite3($bc);$cg=$this->_link->version();$this->server_info=$cg["versionString"];}function
query($E){$F=@$this->_link->query($E);if(!$F){$this->error=$this->_link->lastErrorMsg();return
false;}elseif($F->numColumns())return
new
Min_Result($F);$this->affected_rows=$this->_link->changes();return
true;}function
quote($M){return(is_utf8($M)?"'".$this->_link->escapeString($M)."'":"x'".reset(unpack('H*',$M))."'");}function
store_result(){return$this->_result;}function
result($E,$l=0){$F=$this->query($E);if(!is_object($F))return
false;$H=$F->_result->fetchArray();return$H[$l];}}class
Min_Result{var$_result,$_offset=0,$num_rows;function
Min_Result($F){$this->_result=$F;}function
fetch_assoc(){return$this->_result->fetchArray(SQLITE3_ASSOC);}function
fetch_row(){return$this->_result->fetchArray(SQLITE3_NUM);}function
fetch_field(){$e=$this->_offset++;$S=$this->_result->columnType($e);return(object)array("name"=>$this->_result->columnName($e),"type"=>$S,"charsetnr"=>($S==SQLITE3_BLOB?63:0),);}function
__desctruct(){return$this->_result->finalize();}}}else{class
Min_SQLite{var$extension="SQLite",$server_info,$affected_rows,$error,$_link;function
Min_SQLite($bc){$this->server_info=sqlite_libversion();$this->_link=new
SQLiteDatabase($bc);}function
query($E,$Pf=false){$qd=($Pf?"unbufferedQuery":"query");$F=@$this->_link->$qd($E,SQLITE_BOTH,$k);if(!$F){$this->error=$k;return
false;}elseif($F===true){$this->affected_rows=$this->changes();return
true;}return
new
Min_Result($F);}function
quote($M){return"'".sqlite_escape_string($M)."'";}function
store_result(){return$this->_result;}function
result($E,$l=0){$F=$this->query($E);if(!is_object($F))return
false;$H=$F->_result->fetch();return$H[$l];}}class
Min_Result{var$_result,$_offset=0,$num_rows;function
Min_Result($F){$this->_result=$F;if(method_exists($F,'numRows'))$this->num_rows=$F->numRows();}function
fetch_assoc(){$H=$this->_result->fetch(SQLITE_ASSOC);if(!$H)return
false;$G=array();foreach($H
as$v=>$W)$G[($v[0]=='"'?idf_unescape($v):$v)]=$W;return$G;}function
fetch_row(){return$this->_result->fetch(SQLITE_NUM);}function
fetch_field(){$_=$this->_result->fieldName($this->_offset++);$ge='(\\[.*]|"(?:[^"]|"")*"|(.+))';if(preg_match("~^($ge\\.)?$ge\$~",$_,$z)){$O=($z[3]!=""?$z[3]:idf_unescape($z[2]));$_=($z[5]!=""?$z[5]:idf_unescape($z[4]));}return(object)array("name"=>$_,"orgname"=>$_,"orgtable"=>$O,);}}}}elseif(extension_loaded("pdo_sqlite")){class
Min_SQLite
extends
Min_PDO{var$extension="PDO_SQLite";function
Min_SQLite($bc){$this->dsn(DRIVER.":$bc","","");}}}if(class_exists("Min_SQLite")){class
Min_DB
extends
Min_SQLite{function
Min_DB(){$this->Min_SQLite(":memory:");}function
select_db($bc){if(is_readable($bc)&&$this->query("ATTACH ".$this->quote(ereg("(^[/\\\\]|:)",$bc)?$bc:dirname($_SERVER["SCRIPT_FILENAME"])."/$bc")." AS a")){$this->Min_SQLite($bc);return
true;}return
false;}function
multi_query($E){return$this->_result=$this->query($E);}function
next_result(){return
false;}}}function
idf_escape($r){return'"'.str_replace('"','""',$r).'"';}function
table($r){return
idf_escape($r);}function
connect(){return
new
Min_DB;}function
get_databases(){return
array();}function
limit($E,$Z,$x,$A=0,$Ve=" "){return" $E$Z".($x!==null?$Ve."LIMIT $x".($A?" OFFSET $A":""):"");}function
limit1($E,$Z){global$g;return($g->result("SELECT sqlite_compileoption_used('ENABLE_UPDATE_DELETE_LIMIT')")?limit($E,$Z,1):" $E$Z");}function
db_collation($j,$Qa){global$g;return$g->result("PRAGMA encoding");}function
engines(){return
array();}function
logged_user(){return
get_current_user();}function
tables_list(){return
get_key_vals("SELECT name, type FROM sqlite_master WHERE type IN ('table', 'view') ORDER BY (name = 'sqlite_sequence'), name",1);}function
count_tables($i){return
array();}function
table_status($_=""){$G=array();foreach(get_rows("SELECT name AS Name, type AS Engine FROM sqlite_master WHERE type IN ('table', 'view')".($_!=""?" AND name = ".q($_):""))as$H){$H["Auto_increment"]="";$G[$H["Name"]]=$H;}foreach(get_rows("SELECT * FROM sqlite_sequence",null,"")as$H)$G[$H["name"]]["Auto_increment"]=$H["seq"];return($_!=""?$G[$_]:$G);}function
is_view($P){return$P["Engine"]=="view";}function
fk_support($P){global$g;return$_GET["create"]==""&&!$g->result("SELECT sqlite_compileoption_used('OMIT_FOREIGN_KEY')");}function
fields($O){$G=array();foreach(get_rows("PRAGMA table_info(".table($O).")")as$H){$S=strtolower($H["type"]);$nb=$H["dflt_value"];$G[$H["name"]]=array("field"=>$H["name"],"type"=>(eregi("int",$S)?"integer":(eregi("char|clob|text",$S)?"text":(eregi("blob",$S)?"blob":(eregi("real|floa|doub",$S)?"real":"numeric")))),"full_type"=>$S,"default"=>(ereg("'(.*)'",$nb,$z)?str_replace("''","'",$z[1]):($nb=="NULL"?null:$nb)),"null"=>!$H["notnull"],"auto_increment"=>eregi('^integer$',$S)&&$H["pk"],"privileges"=>array("select"=>1,"insert"=>1,"update"=>1),"primary"=>$H["pk"],);}return$G;}function
indexes($O,$h=null){$G=array();$pe=array();foreach(fields($O)as$l){if($l["primary"])$pe[]=$l["field"];}if($pe)$G[""]=array("type"=>"PRIMARY","columns"=>$pe,"lengths"=>array());foreach(get_rows("PRAGMA index_list(".table($O).")")as$H){$G[$H["name"]]["type"]=($H["unique"]?"UNIQUE":"INDEX");$G[$H["name"]]["lengths"]=array();foreach(get_rows("PRAGMA index_info(".idf_escape($H["name"]).")")as$Ne)$G[$H["name"]]["columns"][]=$Ne["name"];}return$G;}function
foreign_keys($O){$G=array();foreach(get_rows("PRAGMA foreign_key_list(".table($O).")")as$H){$n=&$G[$H["id"]];if(!$n)$n=$H;$n["source"][]=$H["from"];$n["target"][]=$H["to"];}return$G;}function
view($_){global$g;return
array("select"=>preg_replace('~^(?:[^`"[]+|`[^`]*`|"[^"]*")* AS\\s+~iU','',$g->result("SELECT sql FROM sqlite_master WHERE name = ".q($_))));}function
collations(){return(isset($_GET["create"])?get_vals("PRAGMA collation_list",1):array());}function
information_schema($j){return
false;}function
error(){global$g;return
h($g->error);}function
exact_value($W){return
q($W);}function
check_sqlite_name($_){global$g;$Xb="db|sdb|sqlite";if(!preg_match("~^[^\\0]*\\.($Xb)\$~",$_)){$g->error=sprintf('Prosím použijte jednu z koncovek %s.',str_replace("|",", ",$Xb));return
false;}return
true;}function
create_database($j,$d){global$g;if(file_exists($j)){$g->error='Soubor existuje.';return
false;}if(!check_sqlite_name($j))return
false;$y=new
Min_SQLite($j);$y->query('PRAGMA encoding = "UTF-8"');$y->query('CREATE TABLE adminer (i)');$y->query('DROP TABLE adminer');return
true;}function
drop_databases($i){global$g;$g->Min_SQLite(":memory:");foreach($i
as$j){if(!@unlink($j)){$g->error='Soubor existuje.';return
false;}}return
true;}function
rename_database($_,$d){global$g;if(!check_sqlite_name($_))return
false;$g->Min_SQLite(":memory:");$g->error='Soubor existuje.';return@rename(DB,$_);}function
auto_increment(){return" PRIMARY KEY".(DRIVER=="sqlite"?" AUTOINCREMENT":"");}function
alter_table($O,$_,$m,$fc,$Ua,$Gb,$d,$za,$de){$c=array();foreach($m
as$l){if($l[1])$c[]=($O!=""&&$l[0]==""?"ADD ":"  ").implode($l[1]);}$c=array_merge($c,$fc);if($O!=""){foreach($c
as$W){if(!queries("ALTER TABLE ".table($O)." $W"))return
false;}if($O!=$_&&!queries("ALTER TABLE ".table($O)." RENAME TO ".table($_)))return
false;}elseif(!queries("CREATE TABLE ".table($_)." (\n".implode(",\n",$c)."\n)"))return
false;if($za)queries("UPDATE sqlite_sequence SET seq = $za WHERE name = ".q($_));return
true;}function
alter_indexes($O,$c){foreach($c
as$W){if(!queries($W[2]=="DROP"?"DROP INDEX ".idf_escape($W[1]):"CREATE $W[0] ".($W[0]!="INDEX"?"INDEX ":"").idf_escape($W[1]!=""?$W[1]:uniqid($O."_"))." ON ".table($O)." $W[2]"))return
false;}return
true;}function
truncate_tables($Q){return
apply_queries("DELETE FROM",$Q);}function
drop_views($Y){return
apply_queries("DROP VIEW",$Y);}function
drop_tables($Q){return
apply_queries("DROP TABLE",$Q);}function
move_tables($Q,$Y,$wf){return
false;}function
trigger($_){global$g;if($_=="")return
array("Statement"=>"BEGIN\n\t;\nEND");preg_match('~^CREATE\\s+TRIGGER\\s*(?:[^`"\\s]+|`[^`]*`|"[^"]*")+\\s*([a-z]+)\\s+([a-z]+)\\s+ON\\s*(?:[^`"\\s]+|`[^`]*`|"[^"]*")+\\s*(?:FOR\\s*EACH\\s*ROW\\s)?(.*)~is',$g->result("SELECT sql FROM sqlite_master WHERE name = ".q($_)),$z);return
array("Timing"=>strtoupper($z[1]),"Event"=>strtoupper($z[2]),"Trigger"=>$_,"Statement"=>$z[3]);}function
triggers($O){$G=array();foreach(get_rows("SELECT * FROM sqlite_master WHERE type = 'trigger' AND tbl_name = ".q($O))as$H){preg_match('~^CREATE\\s+TRIGGER\\s*(?:[^`"\\s]+|`[^`]*`|"[^"]*")+\\s*([a-z]+)\\s*([a-z]+)~i',$H["sql"],$z);$G[$H["name"]]=array($z[1],$z[2]);}return$G;}function
trigger_options(){return
array("Timing"=>array("BEFORE","AFTER","INSTEAD OF"),"Type"=>array("FOR EACH ROW"),);}function
routine($_,$S){}function
routines(){}function
routine_languages(){}function
begin(){return
queries("BEGIN");}function
insert_into($O,$L){return
queries("INSERT INTO ".table($O).($L?" (".implode(", ",array_keys($L)).")\nVALUES (".implode(", ",$L).")":"DEFAULT VALUES"));}function
insert_update($O,$L,$pe){return
queries("REPLACE INTO ".table($O)." (".implode(", ",array_keys($L)).") VALUES (".implode(", ",$L).")");}function
last_id(){global$g;return$g->result("SELECT LAST_INSERT_ROWID()");}function
explain($g,$E){return$g->query("EXPLAIN $E");}function
found_rows($P,$Z){}function
types(){return
array();}function
schemas(){return
array();}function
get_schema(){return"";}function
set_schema($Re){return
true;}function
create_sql($O,$za){global$g;return$g->result("SELECT sql FROM sqlite_master WHERE type = 'table' AND name = ".q($O));}function
truncate_sql($O){return"DELETE FROM ".table($O);}function
use_sql($kb){}function
trigger_sql($O,$N){return
implode(get_vals("SELECT sql || ';;\n' FROM sqlite_master WHERE type = 'trigger' AND tbl_name = ".q($O)));}function
show_variables(){global$g;$G=array();foreach(array("auto_vacuum","cache_size","count_changes","default_cache_size","empty_result_callbacks","encoding","foreign_keys","full_column_names","fullfsync","journal_mode","journal_size_limit","legacy_file_format","locking_mode","page_size","max_page_count","read_uncommitted","recursive_triggers","reverse_unordered_selects","secure_delete","short_column_names","synchronous","temp_store","temp_store_directory","schema_version","integrity_check","quick_check")as$v)$G[$v]=$g->result("PRAGMA $v");return$G;}function
show_status(){$G=array();foreach(get_vals("PRAGMA compile_options")as$Kd){list($v,$W)=explode("=",$Kd,2);$G[$v]=$W;}return$G;}function
support($Zb){return
ereg('^(view|trigger|variables|status|dump)$',$Zb);}$u="sqlite";$T=array("integer"=>0,"real"=>0,"numeric"=>0,"text"=>0,"blob"=>0);$hf=array_keys($T);$Vf=array();$Jd=array("=","<",">","<=",">=","!=","LIKE","LIKE %%","IN","IS NULL","NOT LIKE","NOT IN","IS NOT NULL","");$oc=array("hex","length","lower","round","unixepoch","upper");$tc=array("avg","count","count distinct","group_concat","max","min","sum");$_b=array(array(),array("integer|real|numeric"=>"+/-","text"=>"||",));}$ub["pgsql"]="PostgreSQL";if(isset($_GET["pgsql"])){$me=array("PgSQL","PDO_PgSQL");define("DRIVER","pgsql");if(extension_loaded("pgsql")){class
Min_DB{var$extension="PgSQL",$_link,$_result,$_string,$_database=true,$server_info,$affected_rows,$error;function
_error($Jb,$k){if(ini_bool("html_errors"))$k=html_entity_decode(strip_tags($k));$k=ereg_replace('^[^:]*: ','',$k);$this->error=$k;}function
connect($K,$U,$C){global$b;$j=$b->database();set_error_handler(array($this,'_error'));$this->_string="host='".str_replace(":","' port='",addcslashes($K,"'\\"))."' user='".addcslashes($U,"'\\")."' password='".addcslashes($C,"'\\")."'";$this->_link=@pg_connect("$this->_string dbname='".($j!=""?addcslashes($j,"'\\"):"postgres")."'",PGSQL_CONNECT_FORCE_NEW);if(!$this->_link&&$j!=""){$this->_database=false;$this->_link=@pg_connect("$this->_string dbname='postgres'",PGSQL_CONNECT_FORCE_NEW);}restore_error_handler();if($this->_link){$cg=pg_version($this->_link);$this->server_info=$cg["server"];pg_set_client_encoding($this->_link,"UTF8");}return(bool)$this->_link;}function
quote($M){return"'".pg_escape_string($this->_link,$M)."'";}function
select_db($kb){global$b;if($kb==$b->database())return$this->_database;$G=@pg_connect("$this->_string dbname='".addcslashes($kb,"'\\")."'",PGSQL_CONNECT_FORCE_NEW);if($G)$this->_link=$G;return$G;}function
close(){$this->_link=@pg_connect("$this->_string dbname='postgres'");}function
query($E,$Pf=false){$F=@pg_query($this->_link,$E);if(!$F){$this->error=pg_last_error($this->_link);return
false;}elseif(!pg_num_fields($F)){$this->affected_rows=pg_affected_rows($F);return
true;}return
new
Min_Result($F);}function
multi_query($E){return$this->_result=$this->query($E);}function
store_result(){return$this->_result;}function
next_result(){return
false;}function
result($E,$l=0){$F=$this->query($E);if(!$F||!$F->num_rows)return
false;return
pg_fetch_result($F->_result,0,$l);}}class
Min_Result{var$_result,$_offset=0,$num_rows;function
Min_Result($F){$this->_result=$F;$this->num_rows=pg_num_rows($F);}function
fetch_assoc(){return
pg_fetch_assoc($this->_result);}function
fetch_row(){return
pg_fetch_row($this->_result);}function
fetch_field(){$e=$this->_offset++;$G=new
stdClass;if(function_exists('pg_field_table'))$G->orgtable=pg_field_table($this->_result,$e);$G->name=pg_field_name($this->_result,$e);$G->orgname=$G->name;$G->type=pg_field_type($this->_result,$e);$G->charsetnr=($G->type=="bytea"?63:0);return$G;}function
__destruct(){pg_free_result($this->_result);}}}elseif(extension_loaded("pdo_pgsql")){class
Min_DB
extends
Min_PDO{var$extension="PDO_PgSQL";function
connect($K,$U,$C){global$b;$j=$b->database();$M="pgsql:host='".str_replace(":","' port='",addcslashes($K,"'\\"))."' options='-c client_encoding=utf8'";$this->dsn("$M dbname='".($j!=""?addcslashes($j,"'\\"):"postgres")."'",$U,$C);return
true;}function
select_db($kb){global$b;return($b->database()==$kb);}function
close(){}}}function
idf_escape($r){return'"'.str_replace('"','""',$r).'"';}function
table($r){return
idf_escape($r);}function
connect(){global$b;$g=new
Min_DB;$gb=$b->credentials();if($g->connect($gb[0],$gb[1],$gb[2])){if($g->server_info>=9)$g->query("SET application_name = 'Adminer'");return$g;}return$g->error;}function
get_databases(){return
get_vals("SELECT datname FROM pg_database ORDER BY datname");}function
limit($E,$Z,$x,$A=0,$Ve=" "){return" $E$Z".($x!==null?$Ve."LIMIT $x".($A?" OFFSET $A":""):"");}function
limit1($E,$Z){return" $E$Z";}function
db_collation($j,$Qa){global$g;return$g->result("SHOW LC_COLLATE");}function
engines(){return
array();}function
logged_user(){global$g;return$g->result("SELECT user");}function
tables_list(){return
get_key_vals("SELECT table_name, table_type FROM information_schema.tables WHERE table_schema = current_schema() ORDER BY table_name");}function
count_tables($i){return
array();}function
table_status($_=""){$G=array();foreach(get_rows("SELECT relname AS \"Name\", CASE relkind WHEN 'r' THEN 'table' ELSE 'view' END AS \"Engine\", pg_relation_size(oid) AS \"Data_length\", pg_total_relation_size(oid) - pg_relation_size(oid) AS \"Index_length\", obj_description(oid, 'pg_class') AS \"Comment\", relhasoids AS \"Oid\", reltuples as \"Rows\"
FROM pg_class
WHERE relkind IN ('r','v')
AND relnamespace = (SELECT oid FROM pg_namespace WHERE nspname = current_schema())".($_!=""?" AND relname = ".q($_):""))as$H)$G[$H["Name"]]=$H;return($_!=""?$G[$_]:$G);}function
is_view($P){return$P["Engine"]=="view";}function
fk_support($P){return
true;}function
fields($O){$G=array();foreach(get_rows("SELECT a.attname AS field, format_type(a.atttypid, a.atttypmod) AS full_type, d.adsrc AS default, a.attnotnull, col_description(c.oid, a.attnum) AS comment
FROM pg_class c
JOIN pg_namespace n ON c.relnamespace = n.oid
JOIN pg_attribute a ON c.oid = a.attrelid
LEFT JOIN pg_attrdef d ON c.oid = d.adrelid AND a.attnum = d.adnum
WHERE c.relname = ".q($O)."
AND n.nspname = current_schema()
AND NOT a.attisdropped
AND a.attnum > 0
ORDER BY a.attnum")as$H){ereg('(.*)(\\((.*)\\))?',$H["full_type"],$z);list(,$H["type"],,$H["length"])=$z;$H["full_type"]=$H["type"].($H["length"]?"($H[length])":"");$H["null"]=($H["attnotnull"]=="f");$H["auto_increment"]=eregi("^nextval\\(",$H["default"]);$H["privileges"]=array("insert"=>1,"select"=>1,"update"=>1);if(preg_match('~^(.*)::.+$~',$H["default"],$z))$H["default"]=($z[1][0]=="'"?idf_unescape($z[1]):$z[1]);$G[$H["field"]]=$H;}return$G;}function
indexes($O,$h=null){global$g;if(!is_object($h))$h=$g;$G=array();$qf=$h->result("SELECT oid FROM pg_class WHERE relnamespace = (SELECT oid FROM pg_namespace WHERE nspname = current_schema()) AND relname = ".q($O));$f=get_key_vals("SELECT attnum, attname FROM pg_attribute WHERE attrelid = $qf AND attnum > 0",$h);foreach(get_rows("SELECT relname, indisunique, indisprimary, indkey FROM pg_index i, pg_class ci WHERE i.indrelid = $qf AND ci.oid = i.indexrelid",$h)as$H){$G[$H["relname"]]["type"]=($H["indisprimary"]=="t"?"PRIMARY":($H["indisunique"]=="t"?"UNIQUE":"INDEX"));$G[$H["relname"]]["columns"]=array();foreach(explode(" ",$H["indkey"])as$Cc)$G[$H["relname"]]["columns"][]=$f[$Cc];$G[$H["relname"]]["lengths"]=array();}return$G;}function
foreign_keys($O){global$Fd;$G=array();foreach(get_rows("SELECT conname, pg_get_constraintdef(oid) AS definition
FROM pg_constraint
WHERE conrelid = (SELECT pc.oid FROM pg_class AS pc INNER JOIN pg_namespace AS pn ON (pn.oid = pc.relnamespace) WHERE pc.relname = ".q($O)." AND pn.nspname = current_schema())
AND contype = 'f'::char
ORDER BY conkey, conname")as$H){if(preg_match('~FOREIGN KEY\s*\((.+)\)\s*REFERENCES (.+)\((.+)\)(.*)$~iA',$H['definition'],$z)){$H['source']=array_map('trim',explode(',',$z[1]));$H['table']=$z[2];if(preg_match('~(.+)\.(.+)~',$z[2],$dd)){$H['ns']=$dd[1];$H['table']=$dd[2];}$H['target']=array_map('trim',explode(',',$z[3]));$H['on_delete']=(preg_match("~ON DELETE ($Fd)~",$z[4],$dd)?$dd[1]:'NO ACTION');$H['on_update']=(preg_match("~ON UPDATE ($Fd)~",$z[4],$dd)?$dd[1]:'NO ACTION');$G[$H['conname']]=$H;}}return$G;}function
view($_){global$g;return
array("select"=>$g->result("SELECT pg_get_viewdef(".q($_).")"));}function
collations(){return
array();}function
information_schema($j){return($j=="information_schema");}function
error(){global$g;$G=h($g->error);if(preg_match('~^(.*\\n)?([^\\n]*)\\n( *)\\^(\\n.*)?$~s',$G,$z))$G=$z[1].preg_replace('~((?:[^&]|&[^;]*;){'.strlen($z[3]).'})(.*)~','\\1<b>\\2</b>',$z[2]).$z[4];return
nl_br($G);}function
exact_value($W){return
q($W);}function
create_database($j,$d){return
queries("CREATE DATABASE ".idf_escape($j).($d?" ENCODING ".idf_escape($d):""));}function
drop_databases($i){global$g;$g->close();return
apply_queries("DROP DATABASE",$i,'idf_escape');}function
rename_database($_,$d){return
queries("ALTER DATABASE ".idf_escape(DB)." RENAME TO ".idf_escape($_));}function
auto_increment(){return"";}function
alter_table($O,$_,$m,$fc,$Ua,$Gb,$d,$za,$de){$c=array();$xe=array();foreach($m
as$l){$e=idf_escape($l[0]);$W=$l[1];if(!$W)$c[]="DROP $e";else{$ag=$W[5];unset($W[5]);if(isset($W[6])&&$l[0]=="")$W[1]=($W[1]=="bigint"?" big":" ")."serial";if($l[0]=="")$c[]=($O!=""?"ADD ":"  ").implode($W);else{if($e!=$W[0])$xe[]="ALTER TABLE ".table($O)." RENAME $e TO $W[0]";$c[]="ALTER $e TYPE$W[1]";if(!$W[6]){$c[]="ALTER $e ".($W[3]?"SET$W[3]":"DROP DEFAULT");$c[]="ALTER $e ".($W[2]==" NULL"?"DROP NOT":"SET").$W[2];}}if($l[0]!=""||$ag!="")$xe[]="COMMENT ON COLUMN ".table($O).".$W[0] IS ".($ag!=""?substr($ag,9):"''");}}$c=array_merge($c,$fc);if($O=="")array_unshift($xe,"CREATE TABLE ".table($_)." (\n".implode(",\n",$c)."\n)");elseif($c)array_unshift($xe,"ALTER TABLE ".table($O)."\n".implode(",\n",$c));if($O!=""&&$O!=$_)$xe[]="ALTER TABLE ".table($O)." RENAME TO ".table($_);if($O!=""||$Ua!="")$xe[]="COMMENT ON TABLE ".table($_)." IS ".q($Ua);if($za!=""){}foreach($xe
as$E){if(!queries($E))return
false;}return
true;}function
alter_indexes($O,$c){$db=array();$vb=array();foreach($c
as$W){if($W[0]!="INDEX")$db[]=($W[2]=="DROP"?"\nDROP CONSTRAINT ".idf_escape($W[1]):"\nADD $W[0] ".($W[0]=="PRIMARY"?"KEY ":"").$W[2]);elseif($W[2]=="DROP")$vb[]=idf_escape($W[1]);elseif(!queries("CREATE INDEX ".idf_escape($W[1]!=""?$W[1]:uniqid($O."_"))." ON ".table($O)." $W[2]"))return
false;}return((!$db||queries("ALTER TABLE ".table($O).implode(",",$db)))&&(!$vb||queries("DROP INDEX ".implode(", ",$vb))));}function
truncate_tables($Q){return
queries("TRUNCATE ".implode(", ",array_map('table',$Q)));return
true;}function
drop_views($Y){return
queries("DROP VIEW ".implode(", ",array_map('table',$Y)));}function
drop_tables($Q){return
queries("DROP TABLE ".implode(", ",array_map('table',$Q)));}function
move_tables($Q,$Y,$wf){foreach($Q
as$O){if(!queries("ALTER TABLE ".table($O)." SET SCHEMA ".idf_escape($wf)))return
false;}foreach($Y
as$O){if(!queries("ALTER VIEW ".table($O)." SET SCHEMA ".idf_escape($wf)))return
false;}return
true;}function
trigger($_){if($_=="")return
array("Statement"=>"EXECUTE PROCEDURE ()");$I=get_rows('SELECT trigger_name AS "Trigger", condition_timing AS "Timing", event_manipulation AS "Event", \'FOR EACH \' || action_orientation AS "Type", action_statement AS "Statement" FROM information_schema.triggers WHERE event_object_table = '.q($_GET["trigger"]).' AND trigger_name = '.q($_));return
reset($I);}function
triggers($O){$G=array();foreach(get_rows("SELECT * FROM information_schema.triggers WHERE event_object_table = ".q($O))as$H)$G[$H["trigger_name"]]=array($H["condition_timing"],$H["event_manipulation"]);return$G;}function
trigger_options(){return
array("Timing"=>array("BEFORE","AFTER"),"Type"=>array("FOR EACH ROW","FOR EACH STATEMENT"),);}function
routines(){return
get_rows('SELECT p.proname AS "ROUTINE_NAME", p.proargtypes AS "ROUTINE_TYPE", pg_catalog.format_type(p.prorettype, NULL) AS "DTD_IDENTIFIER"
FROM pg_catalog.pg_namespace n
JOIN pg_catalog.pg_proc p ON p.pronamespace = n.oid
WHERE n.nspname = current_schema()
ORDER BY p.proname');}function
routine_languages(){return
get_vals("SELECT langname FROM pg_catalog.pg_language");}function
begin(){return
queries("BEGIN");}function
insert_into($O,$L){return
queries("INSERT INTO ".table($O).($L?" (".implode(", ",array_keys($L)).")\nVALUES (".implode(", ",$L).")":"DEFAULT VALUES"));}function
insert_update($O,$L,$pe){global$g;$Wf=array();$Z=array();foreach($L
as$v=>$W){$Wf[]="$v = $W";if(isset($pe[idf_unescape($v)]))$Z[]="$v = $W";}return($Z&&queries("UPDATE ".table($O)." SET ".implode(", ",$Wf)." WHERE ".implode(" AND ",$Z))&&$g->affected_rows)||queries("INSERT INTO ".table($O)." (".implode(", ",array_keys($L)).") VALUES (".implode(", ",$L).")");}function
last_id(){return
0;}function
explain($g,$E){return$g->query("EXPLAIN $E");}function
found_rows($P,$Z){global$g;if(ereg(" rows=([0-9]+)",$g->result("EXPLAIN SELECT * FROM ".idf_escape($P["Name"]).($Z?" WHERE ".implode(" AND ",$Z):"")),$Ee))return$Ee[1];return
false;}function
types(){return
get_vals("SELECT typname
FROM pg_type
WHERE typnamespace = (SELECT oid FROM pg_namespace WHERE nspname = current_schema())
AND typtype IN ('b','d','e')
AND typelem = 0");}function
schemas(){return
get_vals("SELECT nspname FROM pg_namespace ORDER BY nspname");}function
get_schema(){global$g;return$g->result("SELECT current_schema()");}function
set_schema($Qe){global$g,$T,$hf;$G=$g->query("SET search_path TO ".idf_escape($Qe));foreach(types()as$S){if(!isset($T[$S])){$T[$S]=0;$hf['Uživatelské typy'][]=$S;}}return$G;}function
use_sql($kb){return"\connect ".idf_escape($kb);}function
show_variables(){return
get_key_vals("SHOW ALL");}function
process_list(){return
get_rows("SELECT * FROM pg_stat_activity ORDER BY procpid");}function
show_status(){}function
support($Zb){return
ereg('^(comment|view|scheme|processlist|sequence|trigger|type|variables|drop_col)$',$Zb);}$u="pgsql";$T=array();$hf=array();foreach(array('Čísla'=>array("smallint"=>5,"integer"=>10,"bigint"=>19,"boolean"=>1,"numeric"=>0,"real"=>7,"double precision"=>16,"money"=>20),'Datum a čas'=>array("date"=>13,"time"=>17,"timestamp"=>20,"interval"=>0),'Řetězce'=>array("character"=>0,"character varying"=>0,"text"=>0,"tsquery"=>0,"tsvector"=>0,"uuid"=>0,"xml"=>0),'Binární'=>array("bit"=>0,"bit varying"=>0,"bytea"=>0),'Síť'=>array("cidr"=>43,"inet"=>43,"macaddr"=>17,"txid_snapshot"=>0),'Geometrie'=>array("box"=>0,"circle"=>0,"line"=>0,"lseg"=>0,"path"=>0,"point"=>0,"polygon"=>0),)as$v=>$W){$T+=$W;$hf[$v]=array_keys($W);}$Vf=array();$Jd=array("=","<",">","<=",">=","!=","~","!~","LIKE","LIKE %%","IN","IS NULL","NOT LIKE","NOT IN","IS NOT NULL");$oc=array("char_length","lower","round","to_hex","to_timestamp","upper");$tc=array("avg","count","count distinct","max","min","sum");$_b=array(array("char"=>"md5","date|time"=>"now",),array("int|numeric|real|money"=>"+/-","date|time"=>"+ interval/- interval","char|text"=>"||",));}$ub["oracle"]="Oracle";if(isset($_GET["oracle"])){$me=array("OCI8","PDO_OCI");define("DRIVER","oracle");if(extension_loaded("oci8")){class
Min_DB{var$extension="oci8",$_link,$_result,$server_info,$affected_rows,$error;function
_error($Jb,$k){if(ini_bool("html_errors"))$k=html_entity_decode(strip_tags($k));$k=ereg_replace('^[^:]*: ','',$k);$this->error=$k;}function
connect($K,$U,$C){$this->_link=@oci_new_connect($U,$C,$K,"AL32UTF8");if($this->_link){$this->server_info=oci_server_version($this->_link);return
true;}$k=oci_error();$this->error=$k["message"];return
false;}function
quote($M){return"'".str_replace("'","''",$M)."'";}function
select_db($kb){return
true;}function
query($E,$Pf=false){$F=oci_parse($this->_link,$E);if(!$F){$k=oci_error($this->_link);$this->error=$k["message"];return
false;}set_error_handler(array($this,'_error'));$G=@oci_execute($F);restore_error_handler();if($G){if(oci_num_fields($F))return
new
Min_Result($F);$this->affected_rows=oci_num_rows($F);}return$G;}function
multi_query($E){return$this->_result=$this->query($E);}function
store_result(){return$this->_result;}function
next_result(){return
false;}function
result($E,$l=1){$F=$this->query($E);if(!is_object($F)||!oci_fetch($F->_result))return
false;return
oci_result($F->_result,$l);}}class
Min_Result{var$_result,$_offset=1,$num_rows;function
Min_Result($F){$this->_result=$F;}function
_convert($H){foreach((array)$H
as$v=>$W){if(is_a($W,'OCI-Lob'))$H[$v]=$W->load();}return$H;}function
fetch_assoc(){return$this->_convert(oci_fetch_assoc($this->_result));}function
fetch_row(){return$this->_convert(oci_fetch_row($this->_result));}function
fetch_field(){$e=$this->_offset++;$G=new
stdClass;$G->name=oci_field_name($this->_result,$e);$G->orgname=$G->name;$G->type=oci_field_type($this->_result,$e);$G->charsetnr=(ereg("raw|blob|bfile",$G->type)?63:0);return$G;}function
__destruct(){oci_free_statement($this->_result);}}}elseif(extension_loaded("pdo_oci")){class
Min_DB
extends
Min_PDO{var$extension="PDO_OCI";function
connect($K,$U,$C){$this->dsn("oci:dbname=//$K;charset=AL32UTF8",$U,$C);return
true;}function
select_db($kb){return
true;}}}function
idf_escape($r){return'"'.str_replace('"','""',$r).'"';}function
table($r){return
idf_escape($r);}function
connect(){global$b;$g=new
Min_DB;$gb=$b->credentials();if($g->connect($gb[0],$gb[1],$gb[2]))return$g;return$g->error;}function
get_databases(){return
get_vals("SELECT tablespace_name FROM user_tablespaces");}function
limit($E,$Z,$x,$A=0,$Ve=" "){return($A?" * FROM (SELECT t.*, rownum AS rnum FROM (SELECT $E$Z) t WHERE rownum <= ".($x+$A).") WHERE rnum > $A":($x!==null?" * FROM (SELECT $E$Z) WHERE rownum <= ".($x+$A):" $E$Z"));}function
limit1($E,$Z){return" $E$Z";}function
db_collation($j,$Qa){global$g;return$g->result("SELECT value FROM nls_database_parameters WHERE parameter = 'NLS_CHARACTERSET'");}function
engines(){return
array();}function
logged_user(){global$g;return$g->result("SELECT USER FROM DUAL");}function
tables_list(){return
get_key_vals("SELECT table_name, 'table' FROM all_tables WHERE tablespace_name = ".q(DB)."
UNION SELECT view_name, 'view' FROM user_views");}function
count_tables($i){return
array();}function
table_status($_=""){$G=array();$Se=q($_);foreach(get_rows('SELECT table_name "Name", \'table\' "Engine", avg_row_len * num_rows "Data_length", num_rows "Rows" FROM all_tables WHERE tablespace_name = '.q(DB).($_!=""?" AND table_name = $Se":"")."
UNION SELECT view_name, 'view', 0, 0 FROM user_views".($_!=""?" WHERE view_name = $Se":""))as$H){if($_!="")return$H;$G[$H["Name"]]=$H;}return$G;}function
is_view($P){return$P["Engine"]=="view";}function
fk_support($P){return
true;}function
fields($O){$G=array();foreach(get_rows("SELECT * FROM all_tab_columns WHERE table_name = ".q($O)." ORDER BY column_id")as$H){$S=$H["DATA_TYPE"];$w="$H[DATA_PRECISION],$H[DATA_SCALE]";if($w==",")$w=$H["DATA_LENGTH"];$G[$H["COLUMN_NAME"]]=array("field"=>$H["COLUMN_NAME"],"full_type"=>$S.($w?"($w)":""),"type"=>strtolower($S),"length"=>$w,"default"=>$H["DATA_DEFAULT"],"null"=>($H["NULLABLE"]=="Y"),"privileges"=>array("insert"=>1,"select"=>1,"update"=>1),);}return$G;}function
indexes($O,$h=null){$G=array();foreach(get_rows("SELECT uic.*, uc.constraint_type
FROM user_ind_columns uic
LEFT JOIN user_constraints uc ON uic.index_name = uc.constraint_name AND uic.table_name = uc.table_name
WHERE uic.table_name = ".q($O)."
ORDER BY uc.constraint_type, uic.column_position",$h)as$H){$G[$H["INDEX_NAME"]]["type"]=($H["CONSTRAINT_TYPE"]=="P"?"PRIMARY":($H["CONSTRAINT_TYPE"]=="U"?"UNIQUE":"INDEX"));$G[$H["INDEX_NAME"]]["columns"][]=$H["COLUMN_NAME"];$G[$H["INDEX_NAME"]]["lengths"][]=($H["CHAR_LENGTH"]&&$H["CHAR_LENGTH"]!=$H["COLUMN_LENGTH"]?$H["CHAR_LENGTH"]:null);}return$G;}function
view($_){$I=get_rows('SELECT text "select" FROM user_views WHERE view_name = '.q($_));return
reset($I);}function
collations(){return
array();}function
information_schema($j){return
false;}function
error(){global$g;return
h($g->error);}function
exact_value($W){return
q($W);}function
explain($g,$E){$g->query("EXPLAIN PLAN FOR $E");return$g->query("SELECT * FROM plan_table");}function
found_rows($P,$Z){}function
alter_table($O,$_,$m,$fc,$Ua,$Gb,$d,$za,$de){$c=$vb=array();foreach($m
as$l){$W=$l[1];if($W&&$l[0]!=""&&idf_escape($l[0])!=$W[0])queries("ALTER TABLE ".table($O)." RENAME COLUMN ".idf_escape($l[0])." TO $W[0]");if($W)$c[]=($O!=""?($l[0]!=""?"MODIFY (":"ADD ("):"  ").implode($W).($O!=""?")":"");else$vb[]=idf_escape($l[0]);}if($O=="")return
queries("CREATE TABLE ".table($_)." (\n".implode(",\n",$c)."\n)");return(!$c||queries("ALTER TABLE ".table($O)."\n".implode("\n",$c)))&&(!$vb||queries("ALTER TABLE ".table($O)." DROP (".implode(", ",$vb).")"))&&($O==$_||queries("ALTER TABLE ".table($O)." RENAME TO ".table($_)));}function
foreign_keys($O){return
array();}function
truncate_tables($Q){return
apply_queries("TRUNCATE TABLE",$Q);}function
drop_views($Y){return
apply_queries("DROP VIEW",$Y);}function
drop_tables($Q){return
apply_queries("DROP TABLE",$Q);}function
begin(){return
true;}function
insert_into($O,$L){return
queries("INSERT INTO ".table($O)." (".implode(", ",array_keys($L)).")\nVALUES (".implode(", ",$L).")");}function
last_id(){return
0;}function
schemas(){return
get_vals("SELECT DISTINCT owner FROM dba_segments WHERE owner IN (SELECT username FROM dba_users WHERE default_tablespace NOT IN ('SYSTEM','SYSAUX'))");}function
get_schema(){global$g;return$g->result("SELECT sys_context('USERENV', 'SESSION_USER') FROM dual");}function
set_schema($Re){global$g;return$g->query("ALTER SESSION SET CURRENT_SCHEMA = ".idf_escape($Re));}function
show_variables(){return
get_key_vals('SELECT name, display_value FROM v$parameter');}function
process_list(){return
get_rows('SELECT sess.process AS "process", sess.username AS "user", sess.schemaname AS "schema", sess.status AS "status", sess.wait_class AS "wait_class", sess.seconds_in_wait AS "seconds_in_wait", sql.sql_text AS "sql_text", sess.machine AS "machine", sess.port AS "port"
FROM v$session sess LEFT OUTER JOIN v$sql sql
ON sql.sql_id = sess.sql_id
WHERE sess.type = \'USER\'
ORDER BY PROCESS
');}function
show_status(){$I=get_rows('SELECT * FROM v$instance');return
reset($I);}function
support($Zb){return
ereg("view|scheme|processlist|drop_col|variables|status",$Zb);}$u="oracle";$T=array();$hf=array();foreach(array('Čísla'=>array("number"=>38,"binary_float"=>12,"binary_double"=>21),'Datum a čas'=>array("date"=>10,"timestamp"=>29,"interval year"=>12,"interval day"=>28),'Řetězce'=>array("char"=>2000,"varchar2"=>4000,"nchar"=>2000,"nvarchar2"=>4000,"clob"=>4294967295,"nclob"=>4294967295),'Binární'=>array("raw"=>2000,"long raw"=>2147483648,"blob"=>4294967295,"bfile"=>4294967296),)as$v=>$W){$T+=$W;$hf[$v]=array_keys($W);}$Vf=array();$Jd=array("=","<",">","<=",">=","!=","LIKE","LIKE %%","IN","IS NULL","NOT LIKE","NOT REGEXP","NOT IN","IS NOT NULL","");$oc=array("length","lower","round","upper");$tc=array("avg","count","count distinct","max","min","sum");$_b=array(array("date"=>"current_date","timestamp"=>"current_timestamp",),array("number|float|double"=>"+/-","date|timestamp"=>"+ interval/- interval","char|clob"=>"||",));}$ub["mssql"]="MS SQL";if(isset($_GET["mssql"])){$me=array("SQLSRV","MSSQL");define("DRIVER","mssql");if(extension_loaded("sqlsrv")){class
Min_DB{var$extension="sqlsrv",$_link,$_result,$server_info,$affected_rows,$error;function
_get_error(){$this->error="";foreach(sqlsrv_errors()as$k)$this->error.="$k[message]\n";$this->error=rtrim($this->error);}function
connect($K,$U,$C){$this->_link=@sqlsrv_connect($K,array("UID"=>$U,"PWD"=>$C,"CharacterSet"=>"UTF-8"));if($this->_link){$Dc=sqlsrv_server_info($this->_link);$this->server_info=$Dc['SQLServerVersion'];}else$this->_get_error();return(bool)$this->_link;}function
quote($M){return"'".str_replace("'","''",$M)."'";}function
select_db($kb){return$this->query("USE $kb");}function
query($E,$Pf=false){$F=sqlsrv_query($this->_link,$E);if(!$F){$this->_get_error();return
false;}return$this->store_result($F);}function
multi_query($E){$this->_result=sqlsrv_query($this->_link,$E);if(!$this->_result){$this->_get_error();return
false;}return
true;}function
store_result($F=null){if(!$F)$F=$this->_result;if(sqlsrv_field_metadata($F))return
new
Min_Result($F);$this->affected_rows=sqlsrv_rows_affected($F);return
true;}function
next_result(){return
sqlsrv_next_result($this->_result);}function
result($E,$l=0){$F=$this->query($E);if(!is_object($F))return
false;$H=$F->fetch_row();return$H[$l];}}class
Min_Result{var$_result,$_offset=0,$_fields,$num_rows;function
Min_Result($F){$this->_result=$F;}function
_convert($H){foreach((array)$H
as$v=>$W){if(is_a($W,'DateTime'))$H[$v]=$W->format("Y-m-d H:i:s");}return$H;}function
fetch_assoc(){return$this->_convert(sqlsrv_fetch_array($this->_result,SQLSRV_FETCH_ASSOC,SQLSRV_SCROLL_NEXT));}function
fetch_row(){return$this->_convert(sqlsrv_fetch_array($this->_result,SQLSRV_FETCH_NUMERIC,SQLSRV_SCROLL_NEXT));}function
fetch_field(){if(!$this->_fields)$this->_fields=sqlsrv_field_metadata($this->_result);$l=$this->_fields[$this->_offset++];$G=new
stdClass;$G->name=$l["Name"];$G->orgname=$l["Name"];$G->type=($l["Type"]==1?254:0);return$G;}function
seek($A){for($p=0;$p<$A;$p++)sqlsrv_fetch($this->_result);}function
__destruct(){sqlsrv_free_stmt($this->_result);}}}elseif(extension_loaded("mssql")){class
Min_DB{var$extension="MSSQL",$_link,$_result,$server_info,$affected_rows,$error;function
connect($K,$U,$C){$this->_link=@mssql_connect($K,$U,$C);if($this->_link){$F=$this->query("SELECT SERVERPROPERTY('ProductLevel'), SERVERPROPERTY('Edition')");$H=$F->fetch_row();$this->server_info=$this->result("sp_server_info 2",2)." [$H[0]] $H[1]";}else$this->error=mssql_get_last_message();return(bool)$this->_link;}function
quote($M){return"'".str_replace("'","''",$M)."'";}function
select_db($kb){return
mssql_select_db($kb);}function
query($E,$Pf=false){$F=mssql_query($E,$this->_link);if(!$F){$this->error=mssql_get_last_message();return
false;}if($F===true){$this->affected_rows=mssql_rows_affected($this->_link);return
true;}return
new
Min_Result($F);}function
multi_query($E){return$this->_result=$this->query($E);}function
store_result(){return$this->_result;}function
next_result(){return
mssql_next_result($this->_result);}function
result($E,$l=0){$F=$this->query($E);if(!is_object($F))return
false;return
mssql_result($F->_result,0,$l);}}class
Min_Result{var$_result,$_offset=0,$_fields,$num_rows;function
Min_Result($F){$this->_result=$F;$this->num_rows=mssql_num_rows($F);}function
fetch_assoc(){return
mssql_fetch_assoc($this->_result);}function
fetch_row(){return
mssql_fetch_row($this->_result);}function
num_rows(){return
mssql_num_rows($this->_result);}function
fetch_field(){$G=mssql_fetch_field($this->_result);$G->orgtable=$G->table;$G->orgname=$G->name;return$G;}function
seek($A){mssql_data_seek($this->_result,$A);}function
__destruct(){mssql_free_result($this->_result);}}}function
idf_escape($r){return"[".str_replace("]","]]",$r)."]";}function
table($r){return($_GET["ns"]!=""?idf_escape($_GET["ns"]).".":"").idf_escape($r);}function
connect(){global$b;$g=new
Min_DB;$gb=$b->credentials();if($g->connect($gb[0],$gb[1],$gb[2]))return$g;return$g->error;}function
get_databases(){return
get_vals("EXEC sp_databases");}function
limit($E,$Z,$x,$A=0,$Ve=" "){return($x!==null?" TOP (".($x+$A).")":"")." $E$Z";}function
limit1($E,$Z){return
limit($E,$Z,1);}function
db_collation($j,$Qa){global$g;return$g->result("SELECT collation_name FROM sys.databases WHERE name =  ".q($j));}function
engines(){return
array();}function
logged_user(){global$g;return$g->result("SELECT SUSER_NAME()");}function
tables_list(){return
get_key_vals("SELECT name, type_desc FROM sys.all_objects WHERE schema_id = SCHEMA_ID(".q(get_schema()).") AND type IN ('S', 'U', 'V') ORDER BY name");}function
count_tables($i){global$g;$G=array();foreach($i
as$j){$g->select_db($j);$G[$j]=$g->result("SELECT COUNT(*) FROM INFORMATION_SCHEMA.TABLES");}return$G;}function
table_status($_=""){$G=array();foreach(get_rows("SELECT name AS Name, type_desc AS Engine FROM sys.all_objects WHERE schema_id = SCHEMA_ID(".q(get_schema()).") AND type IN ('S', 'U', 'V')".($_!=""?" AND name = ".q($_):""))as$H){if($_!="")return$H;$G[$H["Name"]]=$H;}return$G;}function
is_view($P){return$P["Engine"]=="VIEW";}function
fk_support($P){return
true;}function
fields($O){$G=array();foreach(get_rows("SELECT c.*, t.name type, d.definition [default]
FROM sys.all_columns c
JOIN sys.all_objects o ON c.object_id = o.object_id
JOIN sys.types t ON c.user_type_id = t.user_type_id
LEFT JOIN sys.default_constraints d ON c.default_object_id = d.parent_column_id
WHERE o.schema_id = SCHEMA_ID(".q(get_schema()).") AND o.type IN ('S', 'U', 'V') AND o.name = ".q($O))as$H){$S=$H["type"];$w=(ereg("char|binary",$S)?$H["max_length"]:($S=="decimal"?"$H[precision],$H[scale]":""));$G[$H["name"]]=array("field"=>$H["name"],"full_type"=>$S.($w?"($w)":""),"type"=>$S,"length"=>$w,"default"=>$H["default"],"null"=>$H["is_nullable"],"auto_increment"=>$H["is_identity"],"collation"=>$H["collation_name"],"privileges"=>array("insert"=>1,"select"=>1,"update"=>1),"primary"=>$H["is_identity"],);}return$G;}function
indexes($O,$h=null){$G=array();foreach(get_rows("SELECT i.name, key_ordinal, is_unique, is_primary_key, c.name AS column_name
FROM sys.indexes i
INNER JOIN sys.index_columns ic ON i.object_id = ic.object_id AND i.index_id = ic.index_id
INNER JOIN sys.columns c ON ic.object_id = c.object_id AND ic.column_id = c.column_id
WHERE OBJECT_NAME(i.object_id) = ".q($O),$h)as$H){$G[$H["name"]]["type"]=($H["is_primary_key"]?"PRIMARY":($H["is_unique"]?"UNIQUE":"INDEX"));$G[$H["name"]]["lengths"]=array();$G[$H["name"]]["columns"][$H["key_ordinal"]]=$H["column_name"];}return$G;}function
view($_){global$g;return
array("select"=>preg_replace('~^(?:[^[]|\\[[^]]*])*\\s+AS\\s+~isU','',$g->result("SELECT VIEW_DEFINITION FROM INFORMATION_SCHEMA.VIEWS WHERE TABLE_SCHEMA = SCHEMA_NAME() AND TABLE_NAME = ".q($_))));}function
collations(){$G=array();foreach(get_vals("SELECT name FROM fn_helpcollations()")as$d)$G[ereg_replace("_.*","",$d)][]=$d;return$G;}function
information_schema($j){return
false;}function
error(){global$g;return
nl_br(h(preg_replace('~^(\\[[^]]*])+~m','',$g->error)));}function
exact_value($W){return
q($W);}function
create_database($j,$d){return
queries("CREATE DATABASE ".idf_escape($j).(eregi('^[a-z0-9_]+$',$d)?" COLLATE $d":""));}function
drop_databases($i){return
queries("DROP DATABASE ".implode(", ",array_map('idf_escape',$i)));}function
rename_database($_,$d){if(eregi('^[a-z0-9_]+$',$d))queries("ALTER DATABASE ".idf_escape(DB)." COLLATE $d");queries("ALTER DATABASE ".idf_escape(DB)." MODIFY NAME = ".idf_escape($_));return
true;}function
auto_increment(){return" IDENTITY".($_POST["Auto_increment"]!=""?"(".(+$_POST["Auto_increment"]).",1)":"")." PRIMARY KEY";}function
alter_table($O,$_,$m,$fc,$Ua,$Gb,$d,$za,$de){$c=array();foreach($m
as$l){$e=idf_escape($l[0]);$W=$l[1];if(!$W)$c["DROP"][]=" COLUMN $e";else{$W[1]=preg_replace("~( COLLATE )'(\\w+)'~","\\1\\2",$W[1]);if($l[0]=="")$c["ADD"][]="\n  ".implode("",$W).($O==""?substr($fc[$W[0]],16+strlen($W[0])):"");else{unset($W[6]);if($e!=$W[0])queries("EXEC sp_rename ".q(table($O).".$e").", ".q(idf_unescape($W[0])).", 'COLUMN'");$c["ALTER COLUMN ".implode("",$W)][]="";}}}if($O=="")return
queries("CREATE TABLE ".table($_)." (".implode(",",(array)$c["ADD"])."\n)");if($O!=$_)queries("EXEC sp_rename ".q(table($O)).", ".q($_));if($fc)$c[""]=$fc;foreach($c
as$v=>$W){if(!queries("ALTER TABLE ".idf_escape($_)." $v".implode(",",$W)))return
false;}return
true;}function
alter_indexes($O,$c){$s=array();$vb=array();foreach($c
as$W){if($W[2]=="DROP"){if($W[0]=="PRIMARY")$vb[]=idf_escape($W[1]);else$s[]=idf_escape($W[1])." ON ".table($O);}elseif(!queries(($W[0]!="PRIMARY"?"CREATE $W[0] ".($W[0]!="INDEX"?"INDEX ":"").idf_escape($W[1]!=""?$W[1]:uniqid($O."_"))." ON ".table($O):"ALTER TABLE ".table($O)." ADD PRIMARY KEY")." $W[2]"))return
false;}return(!$s||queries("DROP INDEX ".implode(", ",$s)))&&(!$vb||queries("ALTER TABLE ".table($O)." DROP ".implode(", ",$vb)));}function
begin(){return
queries("BEGIN TRANSACTION");}function
insert_into($O,$L){return
queries("INSERT INTO ".table($O).($L?" (".implode(", ",array_keys($L)).")\nVALUES (".implode(", ",$L).")":"DEFAULT VALUES"));}function
insert_update($O,$L,$pe){$Wf=array();$Z=array();foreach($L
as$v=>$W){$Wf[]="$v = $W";if(isset($pe[idf_unescape($v)]))$Z[]="$v = $W";}return
queries("MERGE ".table($O)." USING (VALUES(".implode(", ",$L).")) AS source (c".implode(", c",range(1,count($L))).") ON ".implode(" AND ",$Z)." WHEN MATCHED THEN UPDATE SET ".implode(", ",$Wf)." WHEN NOT MATCHED THEN INSERT (".implode(", ",array_keys($L)).") VALUES (".implode(", ",$L).");");}function
last_id(){global$g;return$g->result("SELECT SCOPE_IDENTITY()");}function
explain($g,$E){$g->query("SET SHOWPLAN_ALL ON");$G=$g->query($E);$g->query("SET SHOWPLAN_ALL OFF");return$G;}function
found_rows($P,$Z){}function
foreign_keys($O){$G=array();foreach(get_rows("EXEC sp_fkeys @fktable_name = ".q($O))as$H){$n=&$G[$H["FK_NAME"]];$n["table"]=$H["PKTABLE_NAME"];$n["source"][]=$H["FKCOLUMN_NAME"];$n["target"][]=$H["PKCOLUMN_NAME"];}return$G;}function
truncate_tables($Q){return
apply_queries("TRUNCATE TABLE",$Q);}function
drop_views($Y){return
queries("DROP VIEW ".implode(", ",array_map('table',$Y)));}function
drop_tables($Q){return
queries("DROP TABLE ".implode(", ",array_map('table',$Q)));}function
move_tables($Q,$Y,$wf){return
apply_queries("ALTER SCHEMA ".idf_escape($wf)." TRANSFER",array_merge($Q,$Y));}function
trigger($_){if($_=="")return
array();$I=get_rows("SELECT s.name [Trigger],
CASE WHEN OBJECTPROPERTY(s.id, 'ExecIsInsertTrigger') = 1 THEN 'INSERT' WHEN OBJECTPROPERTY(s.id, 'ExecIsUpdateTrigger') = 1 THEN 'UPDATE' WHEN OBJECTPROPERTY(s.id, 'ExecIsDeleteTrigger') = 1 THEN 'DELETE' END [Event],
CASE WHEN OBJECTPROPERTY(s.id, 'ExecIsInsteadOfTrigger') = 1 THEN 'INSTEAD OF' ELSE 'AFTER' END [Timing],
c.text
FROM sysobjects s
JOIN syscomments c ON s.id = c.id
WHERE s.xtype = 'TR' AND s.name = ".q($_));$G=reset($I);if($G)$G["Statement"]=preg_replace('~^.+\\s+AS\\s+~isU','',$G["text"]);return$G;}function
triggers($O){$G=array();foreach(get_rows("SELECT sys1.name,
CASE WHEN OBJECTPROPERTY(sys1.id, 'ExecIsInsertTrigger') = 1 THEN 'INSERT' WHEN OBJECTPROPERTY(sys1.id, 'ExecIsUpdateTrigger') = 1 THEN 'UPDATE' WHEN OBJECTPROPERTY(sys1.id, 'ExecIsDeleteTrigger') = 1 THEN 'DELETE' END [Event],
CASE WHEN OBJECTPROPERTY(sys1.id, 'ExecIsInsteadOfTrigger') = 1 THEN 'INSTEAD OF' ELSE 'AFTER' END [Timing]
FROM sysobjects sys1
JOIN sysobjects sys2 ON sys1.parent_obj = sys2.id
WHERE sys1.xtype = 'TR' AND sys2.name = ".q($O))as$H)$G[$H["name"]]=array($H["Timing"],$H["Event"]);return$G;}function
trigger_options(){return
array("Timing"=>array("AFTER","INSTEAD OF"),"Type"=>array("AS"),);}function
schemas(){return
get_vals("SELECT name FROM sys.schemas");}function
get_schema(){global$g;if($_GET["ns"]!="")return$_GET["ns"];return$g->result("SELECT SCHEMA_NAME()");}function
set_schema($Qe){return
true;}function
use_sql($kb){return"USE ".idf_escape($kb);}function
show_variables(){return
array();}function
show_status(){return
array();}function
support($Zb){return
ereg('^(scheme|trigger|view|drop_col)$',$Zb);}$u="mssql";$T=array();$hf=array();foreach(array('Čísla'=>array("tinyint"=>3,"smallint"=>5,"int"=>10,"bigint"=>20,"bit"=>1,"decimal"=>0,"real"=>12,"float"=>53,"smallmoney"=>10,"money"=>20),'Datum a čas'=>array("date"=>10,"smalldatetime"=>19,"datetime"=>19,"datetime2"=>19,"time"=>8,"datetimeoffset"=>10),'Řetězce'=>array("char"=>8000,"varchar"=>8000,"text"=>2147483647,"nchar"=>4000,"nvarchar"=>4000,"ntext"=>1073741823),'Binární'=>array("binary"=>8000,"varbinary"=>8000,"image"=>2147483647),)as$v=>$W){$T+=$W;$hf[$v]=array_keys($W);}$Vf=array();$Jd=array("=","<",">","<=",">=","!=","LIKE","LIKE %%","IN","IS NULL","NOT LIKE","NOT IN","IS NOT NULL");$oc=array("len","lower","round","upper");$tc=array("avg","count","count distinct","max","min","sum");$_b=array(array("date|time"=>"getdate",),array("int|decimal|real|float|money|datetime"=>"+/-","char|text"=>"+",));}$ub=array("server"=>"MySQL")+$ub;if(!defined("DRIVER")){$me=array("MySQLi","MySQL","PDO_MySQL");define("DRIVER","server");if(extension_loaded("mysqli")){class
Min_DB
extends
MySQLi{var$extension="MySQLi";function
Min_DB(){parent::init();}function
connect($K,$U,$C){mysqli_report(MYSQLI_REPORT_OFF);list($xc,$ie)=explode(":",$K,2);$G=@$this->real_connect(($K!=""?$xc:ini_get("mysqli.default_host")),($K.$U!=""?$U:ini_get("mysqli.default_user")),($K.$U.$C!=""?$C:ini_get("mysqli.default_pw")),null,(is_numeric($ie)?$ie:ini_get("mysqli.default_port")),(!is_numeric($ie)?$ie:null));if($G){if(method_exists($this,'set_charset'))$this->set_charset("utf8");else$this->query("SET NAMES utf8");}return$G;}function
result($E,$l=0){$F=$this->query($E);if(!$F)return
false;$H=$F->fetch_array();return$H[$l];}function
quote($M){return"'".$this->escape_string($M)."'";}}}elseif(extension_loaded("mysql")&&!(ini_get("sql.safe_mode")&&extension_loaded("pdo_mysql"))){class
Min_DB{var$extension="MySQL",$server_info,$affected_rows,$error,$_link,$_result;function
connect($K,$U,$C){$this->_link=@mysql_connect(($K!=""?$K:ini_get("mysql.default_host")),("$K$U"!=""?$U:ini_get("mysql.default_user")),("$K$U$C"!=""?$C:ini_get("mysql.default_password")),true,131072);if($this->_link){$this->server_info=mysql_get_server_info($this->_link);if(function_exists('mysql_set_charset'))mysql_set_charset("utf8",$this->_link);else$this->query("SET NAMES utf8");}else$this->error=mysql_error();return(bool)$this->_link;}function
quote($M){return"'".mysql_real_escape_string($M,$this->_link)."'";}function
select_db($kb){return
mysql_select_db($kb,$this->_link);}function
query($E,$Pf=false){$F=@($Pf?mysql_unbuffered_query($E,$this->_link):mysql_query($E,$this->_link));if(!$F){$this->error=mysql_error($this->_link);return
false;}if($F===true){$this->affected_rows=mysql_affected_rows($this->_link);$this->info=mysql_info($this->_link);return
true;}return
new
Min_Result($F);}function
multi_query($E){return$this->_result=$this->query($E);}function
store_result(){return$this->_result;}function
next_result(){return
false;}function
result($E,$l=0){$F=$this->query($E);if(!$F||!$F->num_rows)return
false;return
mysql_result($F->_result,0,$l);}}class
Min_Result{var$num_rows,$_result,$_offset=0;function
Min_Result($F){$this->_result=$F;$this->num_rows=mysql_num_rows($F);}function
fetch_assoc(){return
mysql_fetch_assoc($this->_result);}function
fetch_row(){return
mysql_fetch_row($this->_result);}function
fetch_field(){$G=mysql_fetch_field($this->_result,$this->_offset++);$G->orgtable=$G->table;$G->orgname=$G->name;$G->charsetnr=($G->blob?63:0);return$G;}function
__destruct(){mysql_free_result($this->_result);}}}elseif(extension_loaded("pdo_mysql")){class
Min_DB
extends
Min_PDO{var$extension="PDO_MySQL";function
connect($K,$U,$C){$this->dsn("mysql:host=".str_replace(":",";unix_socket=",preg_replace('~:(\\d)~',';port=\\1',$K)),$U,$C);$this->query("SET NAMES utf8");return
true;}function
select_db($kb){return$this->query("USE ".idf_escape($kb));}function
query($E,$Pf=false){$this->setAttribute(1000,!$Pf);return
parent::query($E,$Pf);}}}function
idf_escape($r){return"`".str_replace("`","``",$r)."`";}function
table($r){return
idf_escape($r);}function
connect(){global$b;$g=new
Min_DB;$gb=$b->credentials();if($g->connect($gb[0],$gb[1],$gb[2])){$g->query("SET sql_quote_show_create = 1, autocommit = 1");return$g;}$G=$g->error;if(function_exists('iconv')&&!is_utf8($G)&&strlen($Oe=iconv("windows-1250","utf-8",$G))>strlen($G))$G=$Oe;return$G;}function
get_databases($ec=true){global$g;$G=&get_session("dbs");if($G===null){if($ec){restart_session();ob_flush();flush();}$G=get_vals($g->server_info>=5?"SELECT SCHEMA_NAME FROM information_schema.SCHEMATA":"SHOW DATABASES");}return$G;}function
limit($E,$Z,$x,$A=0,$Ve=" "){return" $E$Z".($x!==null?$Ve."LIMIT $x".($A?" OFFSET $A":""):"");}function
limit1($E,$Z){return
limit($E,$Z,1);}function
db_collation($j,$Qa){global$g;$G=null;$db=$g->result("SHOW CREATE DATABASE ".idf_escape($j),1);if(preg_match('~ COLLATE ([^ ]+)~',$db,$z))$G=$z[1];elseif(preg_match('~ CHARACTER SET ([^ ]+)~',$db,$z))$G=$Qa[$z[1]][-1];return$G;}function
engines(){$G=array();foreach(get_rows("SHOW ENGINES")as$H){if(ereg("YES|DEFAULT",$H["Support"]))$G[]=$H["Engine"];}return$G;}function
logged_user(){global$g;return$g->result("SELECT USER()");}function
tables_list(){global$g;return
get_key_vals("SHOW".($g->server_info>=5?" FULL":"")." TABLES");}function
count_tables($i){$G=array();foreach($i
as$j)$G[$j]=count(get_vals("SHOW TABLES IN ".idf_escape($j)));return$G;}function
table_status($_=""){$G=array();foreach(get_rows("SHOW TABLE STATUS".($_!=""?" LIKE ".q(addcslashes($_,"%_")):""))as$H){if($H["Engine"]=="InnoDB")$H["Comment"]=preg_replace('~(?:(.+); )?InnoDB free: .*~','\\1',$H["Comment"]);if(!isset($H["Rows"]))$H["Comment"]="";if($_!="")return$H;$G[$H["Name"]]=$H;}return$G;}function
is_view($P){return!isset($P["Rows"]);}function
fk_support($P){return
eregi("InnoDB|IBMDB2I",$P["Engine"]);}function
fields($O){$G=array();foreach(get_rows("SHOW FULL COLUMNS FROM ".table($O))as$H){preg_match('~^([^( ]+)(?:\\((.+)\\))?( unsigned)?( zerofill)?$~',$H["Type"],$z);$G[$H["Field"]]=array("field"=>$H["Field"],"full_type"=>$H["Type"],"type"=>$z[1],"length"=>$z[2],"unsigned"=>ltrim($z[3].$z[4]),"default"=>($H["Default"]!=""||ereg("char",$z[1])?$H["Default"]:null),"null"=>($H["Null"]=="YES"),"auto_increment"=>($H["Extra"]=="auto_increment"),"on_update"=>(eregi('^on update (.+)',$H["Extra"],$z)?$z[1]:""),"collation"=>$H["Collation"],"privileges"=>array_flip(explode(",",$H["Privileges"])),"comment"=>$H["Comment"],"primary"=>($H["Key"]=="PRI"),);}return$G;}function
indexes($O,$h=null){$G=array();foreach(get_rows("SHOW INDEX FROM ".table($O),$h)as$H){$G[$H["Key_name"]]["type"]=($H["Key_name"]=="PRIMARY"?"PRIMARY":($H["Index_type"]=="FULLTEXT"?"FULLTEXT":($H["Non_unique"]?"INDEX":"UNIQUE")));$G[$H["Key_name"]]["columns"][]=$H["Column_name"];$G[$H["Key_name"]]["lengths"][]=$H["Sub_part"];}return$G;}function
foreign_keys($O){global$g,$Fd;static$ge='`(?:[^`]|``)+`';$G=array();$eb=$g->result("SHOW CREATE TABLE ".table($O),1);if($eb){preg_match_all("~CONSTRAINT ($ge) FOREIGN KEY \\(((?:$ge,? ?)+)\\) REFERENCES ($ge)(?:\\.($ge))? \\(((?:$ge,? ?)+)\\)(?: ON DELETE ($Fd))?(?: ON UPDATE ($Fd))?~",$eb,$ed,PREG_SET_ORDER);foreach($ed
as$z){preg_match_all("~$ge~",$z[2],$af);preg_match_all("~$ge~",$z[5],$wf);$G[idf_unescape($z[1])]=array("db"=>idf_unescape($z[4]!=""?$z[3]:$z[4]),"table"=>idf_unescape($z[4]!=""?$z[4]:$z[3]),"source"=>array_map('idf_unescape',$af[0]),"target"=>array_map('idf_unescape',$wf[0]),"on_delete"=>($z[6]?$z[6]:"RESTRICT"),"on_update"=>($z[7]?$z[7]:"RESTRICT"),);}}return$G;}function
view($_){global$g;return
array("select"=>preg_replace('~^(?:[^`]|`[^`]*`)*\\s+AS\\s+~isU','',$g->result("SHOW CREATE VIEW ".table($_),1)));}function
collations(){$G=array();foreach(get_rows("SHOW COLLATION")as$H){if($H["Default"])$G[$H["Charset"]][-1]=$H["Collation"];else$G[$H["Charset"]][]=$H["Collation"];}ksort($G);foreach($G
as$v=>$W)asort($G[$v]);return$G;}function
information_schema($j){global$g;return($g->server_info>=5&&$j=="information_schema");}function
error(){global$g;return
h(preg_replace('~^You have an error.*syntax to use~U',"Syntax error",$g->error));}function
error_line(){global$g;if(ereg(' at line ([0-9]+)$',$g->error,$Ee))return$Ee[1]-1;}function
exact_value($W){return
q($W)." COLLATE utf8_bin";}function
create_database($j,$d){set_session("dbs",null);return
queries("CREATE DATABASE ".idf_escape($j).($d?" COLLATE ".q($d):""));}function
drop_databases($i){set_session("dbs",null);return
apply_queries("DROP DATABASE",$i,'idf_escape');}function
rename_database($_,$d){if(create_database($_,$d)){$Fe=array();foreach(tables_list()as$O=>$S)$Fe[]=table($O)." TO ".idf_escape($_).".".table($O);if(!$Fe||queries("RENAME TABLE ".implode(", ",$Fe))){queries("DROP DATABASE ".idf_escape(DB));return
true;}}return
false;}function
auto_increment(){$_a=" PRIMARY KEY";if($_GET["create"]!=""&&$_POST["auto_increment_col"]){foreach(indexes($_GET["create"])as$s){if(in_array($_POST["fields"][$_POST["auto_increment_col"]]["orig"],$s["columns"],true)){$_a="";break;}if($s["type"]=="PRIMARY")$_a=" UNIQUE";}}return" AUTO_INCREMENT$_a";}function
alter_table($O,$_,$m,$fc,$Ua,$Gb,$d,$za,$de){$c=array();foreach($m
as$l)$c[]=($l[1]?($O!=""?($l[0]!=""?"CHANGE ".idf_escape($l[0]):"ADD"):" ")." ".implode($l[1]).($O!=""?" $l[2]":""):"DROP ".idf_escape($l[0]));$c=array_merge($c,$fc);$ef="COMMENT=".q($Ua).($Gb?" ENGINE=".q($Gb):"").($d?" COLLATE ".q($d):"").($za!=""?" AUTO_INCREMENT=$za":"").$de;if($O=="")return
queries("CREATE TABLE ".table($_)." (\n".implode(",\n",$c)."\n) $ef");if($O!=$_)$c[]="RENAME TO ".table($_);$c[]=$ef;return
queries("ALTER TABLE ".table($O)."\n".implode(",\n",$c));}function
alter_indexes($O,$c){foreach($c
as$v=>$W)$c[$v]=($W[2]=="DROP"?"\nDROP INDEX ".idf_escape($W[1]):"\nADD $W[0] ".($W[0]=="PRIMARY"?"KEY ":"").($W[1]!=""?idf_escape($W[1])." ":"").$W[2]);return
queries("ALTER TABLE ".table($O).implode(",",$c));}function
truncate_tables($Q){return
apply_queries("TRUNCATE TABLE",$Q);}function
drop_views($Y){return
queries("DROP VIEW ".implode(", ",array_map('table',$Y)));}function
drop_tables($Q){return
queries("DROP TABLE ".implode(", ",array_map('table',$Q)));}function
move_tables($Q,$Y,$wf){$Fe=array();foreach(array_merge($Q,$Y)as$O)$Fe[]=table($O)." TO ".idf_escape($wf).".".table($O);return
queries("RENAME TABLE ".implode(", ",$Fe));}function
copy_tables($Q,$Y,$wf){queries("SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO'");foreach($Q
as$O){$_=($wf==DB?table("copy_$O"):idf_escape($wf).".".table($O));if(!queries("DROP TABLE IF EXISTS $_")||!queries("CREATE TABLE $_ LIKE ".table($O))||!queries("INSERT INTO $_ SELECT * FROM ".table($O)))return
false;}foreach($Y
as$O){$_=($wf==DB?table("copy_$O"):idf_escape($wf).".".table($O));$dg=view($O);if(!queries("DROP VIEW IF EXISTS $_")||!queries("CREATE VIEW $_ AS $dg[select]"))return
false;}return
true;}function
trigger($_){if($_=="")return
array();$I=get_rows("SHOW TRIGGERS WHERE `Trigger` = ".q($_));return
reset($I);}function
triggers($O){$G=array();foreach(get_rows("SHOW TRIGGERS LIKE ".q(addcslashes($O,"%_")))as$H)$G[$H["Trigger"]]=array($H["Timing"],$H["Event"]);return$G;}function
trigger_options(){return
array("Timing"=>array("BEFORE","AFTER"),"Type"=>array("FOR EACH ROW"),);}function
routine($_,$S){global$g,$Ib,$Fc,$T;$ua=array("bool","boolean","integer","double precision","real","dec","numeric","fixed","national char","national varchar");$Of="((".implode("|",array_merge(array_keys($T),$ua)).")\\b(?:\\s*\\(((?:[^'\")]*|$Ib)+)\\))?\\s*(zerofill\\s*)?(unsigned(?:\\s+zerofill)?)?)(?:\\s*(?:CHARSET|CHARACTER\\s+SET)\\s*['\"]?([^'\"\\s]+)['\"]?)?";$ge="\\s*(".($S=="FUNCTION"?"":$Fc).")?\\s*(?:`((?:[^`]|``)*)`\\s*|\\b(\\S+)\\s+)$Of";$db=$g->result("SHOW CREATE $S ".idf_escape($_),2);preg_match("~\\(((?:$ge\\s*,?)*)\\)\\s*".($S=="FUNCTION"?"RETURNS\\s+$Of\\s+":"")."(.*)~is",$db,$z);$m=array();preg_match_all("~$ge\\s*,?~is",$z[1],$ed,PREG_SET_ORDER);foreach($ed
as$Yd){$_=str_replace("``","`",$Yd[2]).$Yd[3];$m[]=array("field"=>$_,"type"=>strtolower($Yd[5]),"length"=>preg_replace_callback("~$Ib~s",'normalize_enum',$Yd[6]),"unsigned"=>strtolower(preg_replace('~\\s+~',' ',trim("$Yd[8] $Yd[7]"))),"full_type"=>$Yd[4],"inout"=>strtoupper($Yd[1]),"collation"=>strtolower($Yd[9]),);}if($S!="FUNCTION")return
array("fields"=>$m,"definition"=>$z[11]);return
array("fields"=>$m,"returns"=>array("type"=>$z[12],"length"=>$z[13],"unsigned"=>$z[15],"collation"=>$z[16]),"definition"=>$z[17],"language"=>"SQL",);}function
routines(){return
get_rows("SELECT * FROM information_schema.ROUTINES WHERE ROUTINE_SCHEMA = ".q(DB));}function
routine_languages(){return
array();}function
begin(){return
queries("BEGIN");}function
insert_into($O,$L){return
queries("INSERT INTO ".table($O)." (".implode(", ",array_keys($L)).")\nVALUES (".implode(", ",$L).")");}function
insert_update($O,$L,$pe){foreach($L
as$v=>$W)$L[$v]="$v = $W";$Wf=implode(", ",$L);return
queries("INSERT INTO ".table($O)." SET $Wf ON DUPLICATE KEY UPDATE $Wf");}function
last_id(){global$g;return$g->result("SELECT LAST_INSERT_ID()");}function
explain($g,$E){return$g->query("EXPLAIN $E");}function
found_rows($P,$Z){return($Z||$P["Engine"]!="InnoDB"?null:$P["Rows"]);}function
types(){return
array();}function
schemas(){return
array();}function
get_schema(){return"";}function
set_schema($Qe){return
true;}function
create_sql($O,$za){global$g;$G=$g->result("SHOW CREATE TABLE ".table($O),1);if(!$za)$G=preg_replace('~ AUTO_INCREMENT=\\d+~','',$G);return$G;}function
truncate_sql($O){return"TRUNCATE ".table($O);}function
use_sql($kb){return"USE ".idf_escape($kb);}function
trigger_sql($O,$N){$G="";foreach(get_rows("SHOW TRIGGERS LIKE ".q(addcslashes($O,"%_")),null,"-- ")as$H)$G.="\n".($N=='CREATE+ALTER'?"DROP TRIGGER IF EXISTS ".idf_escape($H["Trigger"]).";;\n":"")."CREATE TRIGGER ".idf_escape($H["Trigger"])." $H[Timing] $H[Event] ON ".table($H["Table"])." FOR EACH ROW\n$H[Statement];;\n";return$G;}function
show_variables(){return
get_key_vals("SHOW VARIABLES");}function
process_list(){return
get_rows("SHOW FULL PROCESSLIST");}function
show_status(){return
get_key_vals("SHOW STATUS");}function
support($Zb){global$g;return!ereg("scheme|sequence|type".($g->server_info<5.1?"|event|partitioning".($g->server_info<5?"|view|routine|trigger":""):""),$Zb);}$u="sql";$T=array();$hf=array();foreach(array('Čísla'=>array("tinyint"=>3,"smallint"=>5,"mediumint"=>8,"int"=>10,"bigint"=>20,"decimal"=>66,"float"=>12,"double"=>21),'Datum a čas'=>array("date"=>10,"datetime"=>19,"timestamp"=>19,"time"=>10,"year"=>4),'Řetězce'=>array("char"=>255,"varchar"=>65535,"tinytext"=>255,"text"=>65535,"mediumtext"=>16777215,"longtext"=>4294967295),'Binární'=>array("bit"=>20,"binary"=>255,"varbinary"=>65535,"tinyblob"=>255,"blob"=>65535,"mediumblob"=>16777215,"longblob"=>4294967295),'Seznamy'=>array("enum"=>65535,"set"=>64),)as$v=>$W){$T+=$W;$hf[$v]=array_keys($W);}$Vf=array("unsigned","zerofill","unsigned zerofill");$Jd=array("=","<",">","<=",">=","!=","LIKE","LIKE %%","REGEXP","IN","IS NULL","NOT LIKE","NOT REGEXP","NOT IN","IS NOT NULL","");$oc=array("char_length","date","from_unixtime","hex","lower","round","sec_to_time","time_to_sec","upper");$tc=array("avg","count","count distinct","group_concat","max","min","sum");$_b=array(array("char"=>"md5/sha1/password/encrypt/uuid","binary"=>"md5/sha1/hex","date|time"=>"now",),array("int|float|double|decimal"=>"+/-","date"=>"+ interval/- interval","time"=>"addtime/subtime","char|text"=>"concat",));}define("SERVER",$_GET[DRIVER]);define("DB",$_GET["db"]);define("ME",preg_replace('~^[^?]*/([^?]*).*~','\\1',$_SERVER["REQUEST_URI"]).'?'.(sid()?SID.'&':'').(SERVER!==null?DRIVER."=".urlencode(SERVER).'&':'').(isset($_GET["username"])?"username=".urlencode($_GET["username"]).'&':'').(DB!=""?'db='.urlencode(DB).'&'.(isset($_GET["ns"])?"ns=".urlencode($_GET["ns"])."&":""):''));$ia="3.4.0";class
Adminer{var$operators;function
name(){return"<a href='http://www.adminer.org/' id='h1'>Adminer</a>";}function
credentials(){return
array(SERVER,$_GET["username"],get_session("pwds"));}function
permanentLogin(){return
password_file();}function
database(){return
DB;}function
databases($ec=true){return
get_databases($ec);}function
headers(){return
true;}function
head(){return
true;}function
loginForm(){global$ub;echo'<table cellspacing="0">
<tr><th>Systém<td>',html_select("auth[driver]",$ub,DRIVER,"loginDriver(this);"),'<tr><th>Server<td><input name="auth[server]" value="',h(SERVER),'" title="hostname[:port]">
<tr><th>Uživatel<td><input id="username" name="auth[username]" value="',h($_GET["username"]),'">
<tr><th>Heslo<td><input type="password" name="auth[password]">
<tr><th>Databáze<td><input name="auth[db]" value="',h($_GET["db"]);?>">
</table>
<script type="text/javascript">
var username = document.getElementById('username');
username.focus();
username.form['auth[driver]'].onchange();
</script>
<?php

echo"<p><input type='submit' value='".'Přihlásit se'."'>\n",checkbox("auth[permanent]",1,$_COOKIE["adminer_permanent"],'Trvalé přihlášení')."\n";}function
login($bd,$C){return
true;}function
tableName($of){return
h($of["Name"]);}function
fieldName($l,$Nd=0){return'<span title="'.h($l["full_type"]).'">'.h($l["field"]).'</span>';}function
selectLinks($of,$L=""){echo'<p class="tabs">';$Zc=array("select"=>'Vypsat data',"table"=>'Zobrazit strukturu');if(is_view($of))$Zc["view"]='Pozměnit pohled';else$Zc["create"]='Pozměnit tabulku';if($L!==null)$Zc["edit"]='Nová položka';foreach($Zc
as$v=>$W)echo" <a href='".h(ME)."$v=".urlencode($of["Name"]).($v=="edit"?$L:"")."'".bold(isset($_GET[$v])).">$W</a>";echo"\n";}function
foreignKeys($O){return
foreign_keys($O);}function
backwardKeys($O,$nf){return
array();}function
backwardKeysPrint($Ba,$H){}function
selectQuery($E){global$u;return"<p><a href='".h(remove_from_uri("page"))."&amp;page=last' title='".'Poslední stránka'."'>&gt;&gt;</a> <code class='jush-$u'>".h(str_replace("\n"," ",$E))."</code> <a href='".h(ME)."sql=".urlencode($E)."'>".'Upravit'."</a></p>\n";}function
rowDescription($O){return"";}function
rowDescriptions($I,$gc){return$I;}function
selectVal($W,$y,$l){$G=($W===null?"<i>NULL</i>":(ereg("char|binary",$l["type"])&&!ereg("var",$l["type"])?"<code>$W</code>":$W));if(ereg('blob|bytea|raw|file',$l["type"])&&!is_utf8($W))$G=lang(array('%d bajt','%d bajty','%d bajtů'),strlen($W));return($y?"<a href='$y'>$G</a>":$G);}function
editVal($W,$l){return(ereg("binary",$l["type"])?reset(unpack("H*",$W)):$W);}function
selectColumnsPrint($J,$f){global$oc,$tc;print_fieldset("select",'Vypsat',$J);$p=0;$nc=array('Funkce'=>$oc,'Agregace'=>$tc);foreach($J
as$v=>$W){$W=$_GET["columns"][$v];echo"<div>".html_select("columns[$p][fun]",array(-1=>"")+$nc,$W["fun"]),"(<select name='columns[$p][col]'><option>".optionlist($f,$W["col"],true)."</select>)</div>\n";$p++;}echo"<div>".html_select("columns[$p][fun]",array(-1=>"")+$nc,"","this.nextSibling.nextSibling.onchange();"),"(<select name='columns[$p][col]' onchange='selectAddRow(this);'><option>".optionlist($f,null,true)."</select>)</div>\n","</div></fieldset>\n";}function
selectSearchPrint($Z,$f,$t){print_fieldset("search",'Vyhledat',$Z);foreach($t
as$p=>$s){if($s["type"]=="FULLTEXT"){echo"(<i>".implode("</i>, <i>",array_map('h',$s["columns"]))."</i>) AGAINST"," <input name='fulltext[$p]' value='".h($_GET["fulltext"][$p])."' onchange='selectFieldChange(this.form);'>",checkbox("boolean[$p]",1,isset($_GET["boolean"][$p]),"BOOL"),"<br>\n";}}$_GET["where"]=(array)$_GET["where"];reset($_GET["where"]);$Ja="this.nextSibling.onchange();";for($p=0;$p<=count($_GET["where"]);$p++){list(,$W)=each($_GET["where"]);if(!$W||("$W[col]$W[val]"!=""&&in_array($W["op"],$this->operators))){echo"<div><select name='where[$p][col]' onchange='$Ja'><option value=''>(".'kdekoliv'.")".optionlist($f,$W["col"],true)."</select>",html_select("where[$p][op]",$this->operators,$W["op"],$Ja),"<input name='where[$p][val]' value='".h($W["val"])."' onchange='".($W?"selectFieldChange(this.form)":"selectAddRow(this)").";'></div>\n";}}echo"</div></fieldset>\n";}function
selectOrderPrint($Nd,$f,$t){print_fieldset("sort",'Seřadit',$Nd);$p=0;foreach((array)$_GET["order"]as$v=>$W){if(isset($f[$W])){echo"<div><select name='order[$p]' onchange='selectFieldChange(this.form);'><option>".optionlist($f,$W,true)."</select>",checkbox("desc[$p]",1,isset($_GET["desc"][$v]),'sestupně')."</div>\n";$p++;}}echo"<div><select name='order[$p]' onchange='selectAddRow(this);'><option>".optionlist($f,null,true)."</select>","<label><input type='checkbox' name='desc[$p]' value='1'>".'sestupně'."</label></div>\n";echo"</div></fieldset>\n";}function
selectLimitPrint($x){echo"<fieldset><legend>".'Limit'."</legend><div>";echo"<input name='limit' size='3' value='".h($x)."'>","</div></fieldset>\n";}function
selectLengthPrint($zf){if($zf!==null){echo"<fieldset><legend>".'Délka textů'."</legend><div>",'<input name="text_length" size="3" value="'.h($zf).'">',"</div></fieldset>\n";}}function
selectActionPrint($t){echo"<fieldset><legend>".'Akce'."</legend><div>","<input type='submit' value='".'Vypsat'."'>"," <span id='noindex' title='".'Průchod celé tabulky'."'></span>","<script type='text/javascript'>\n","var indexColumns = ";$f=array();foreach($t
as$s){if($s["type"]!="FULLTEXT")$f[reset($s["columns"])]=1;}$f[""]=1;foreach($f
as$v=>$W)json_row($v);echo";\n","selectFieldChange(document.getElementById('form'));\n","</script>\n","</div></fieldset>\n";}function
selectCommandPrint(){return!information_schema(DB);}function
selectImportPrint(){return
true;}function
selectEmailPrint($Cb,$f){}function
selectColumnsProcess($f,$t){global$oc,$tc;$J=array();$rc=array();foreach((array)$_GET["columns"]as$v=>$W){if($W["fun"]=="count"||(isset($f[$W["col"]])&&(!$W["fun"]||in_array($W["fun"],$oc)||in_array($W["fun"],$tc)))){$J[$v]=apply_sql_function($W["fun"],(isset($f[$W["col"]])?idf_escape($W["col"]):"*"));if(!in_array($W["fun"],$tc))$rc[]=$J[$v];}}return
array($J,$rc);}function
selectSearchProcess($m,$t){global$u;$G=array();foreach($t
as$p=>$s){if($s["type"]=="FULLTEXT"&&$_GET["fulltext"][$p]!="")$G[]="MATCH (".implode(", ",array_map('idf_escape',$s["columns"])).") AGAINST (".q($_GET["fulltext"][$p]).(isset($_GET["boolean"][$p])?" IN BOOLEAN MODE":"").")";}foreach((array)$_GET["where"]as$W){if("$W[col]$W[val]"!=""&&in_array($W["op"],$this->operators)){$Xa=" $W[op]";if(ereg('IN$',$W["op"])){$Ac=process_length($W["val"]);$Xa.=" (".($Ac!=""?$Ac:"NULL").")";}elseif(!$W["op"])$Xa.=$W["val"];elseif($W["op"]=="LIKE %%")$Xa=" LIKE ".$this->processInput($m[$W["col"]],"%$W[val]%");elseif(!ereg('NULL$',$W["op"]))$Xa.=" ".$this->processInput($m[$W["col"]],$W["val"]);if($W["col"]!="")$G[]=idf_escape($W["col"]).$Xa;else{$Ra=array();foreach($m
as$_=>$l){if(is_numeric($W["val"])||!ereg('int|float|double|decimal',$l["type"])){$_=idf_escape($_);$Ra[]=($u=="sql"&&ereg('char|text|enum|set',$l["type"])&&!ereg('^utf8',$l["collation"])?"CONVERT($_ USING utf8)":$_);}}$G[]=($Ra?"(".implode("$Xa OR ",$Ra)."$Xa)":"0");}}}return$G;}function
selectOrderProcess($m,$t){$G=array();foreach((array)$_GET["order"]as$v=>$W){if(isset($m[$W])||preg_match('~^((COUNT\\(DISTINCT |[A-Z0-9_]+\\()(`(?:[^`]|``)+`|"(?:[^"]|"")+")\\)|COUNT\\(\\*\\))$~',$W))$G[]=(isset($m[$W])?idf_escape($W):$W).(isset($_GET["desc"][$v])?" DESC":"");}return$G;}function
selectLimitProcess(){return(isset($_GET["limit"])?$_GET["limit"]:"30");}function
selectLengthProcess(){return(isset($_GET["text_length"])?$_GET["text_length"]:"100");}function
selectEmailProcess($Z,$gc){return
false;}function
messageQuery($E){global$u;static$cb=0;restart_session();$q="sql-".($cb++);$vc=&get_session("queries");if(strlen($E)>1e6)$E=ereg_replace('[\x80-\xFF]+$','',substr($E,0,1e6))."\n...";$vc[$_GET["db"]][]=array($E,time());return" <span class='time'>".@date("H:i:s")."</span> <a href='#$q' onclick=\"return !toggle('$q');\">".'SQL příkaz'."</a><div id='$q' class='hidden'><pre><code class='jush-$u'>".shorten_utf8($E,1000).'</code></pre><p><a href="'.h(str_replace("db=".urlencode(DB),"db=".urlencode($_GET["db"]),ME).'sql=&history='.(count($vc[$_GET["db"]])-1)).'">'.'Upravit'.'</a></div>';}function
editFunctions($l){global$_b;$G=($l["null"]?"NULL/":"");foreach($_b
as$v=>$oc){if(!$v||(!isset($_GET["call"])&&(isset($_GET["select"])||where($_GET)))){foreach($oc
as$ge=>$W){if(!$ge||ereg($ge,$l["type"]))$G.="/$W";}if($v&&!ereg('set|blob|bytea|raw|file',$l["type"]))$G.="/=";}}return
explode("/",$G);}function
editInput($O,$l,$xa,$X){if($l["type"]=="enum")return(isset($_GET["select"])?"<label><input type='radio'$xa value='-1' checked><i>".'původní'."</i></label> ":"").($l["null"]?"<label><input type='radio'$xa value=''".($X!==null||isset($_GET["select"])?"":" checked")."><i>NULL</i></label> ":"").enum_input("radio",$xa,$l,$X,0);return"";}function
processInput($l,$X,$o=""){if($o=="=")return$X;$_=$l["field"];$G=($l["type"]=="bit"&&ereg("^([0-9]+|b'[0-1]+')\$",$X)?$X:q($X));if(ereg('^(now|getdate|uuid)$',$o))$G="$o()";elseif(ereg('^current_(date|timestamp)$',$o))$G=$o;elseif(ereg('^([+-]|\\|\\|)$',$o))$G=idf_escape($_)." $o $G";elseif(ereg('^[+-] interval$',$o))$G=idf_escape($_)." $o ".(preg_match("~^(\\d+|'[0-9.: -]') [A-Z_]+$~i",$X)?$X:$G);elseif(ereg('^(addtime|subtime|concat)$',$o))$G="$o(".idf_escape($_).", $G)";elseif(ereg('^(md5|sha1|password|encrypt|hex)$',$o))$G="$o($G)";if(ereg("binary",$l["type"]))$G="unhex($G)";return$G;}function
dumpOutput(){$G=array('text'=>'otevřít','file'=>'uložit');if(function_exists('gzencode'))$G['gz']='gzip';if(function_exists('bzcompress'))$G['bz2']='bzip2';return$G;}function
dumpFormat(){return
array('sql'=>'SQL','csv'=>'CSV,','csv;'=>'CSV;','tsv'=>'TSV');}function
dumpTable($O,$N,$Kc=false){if($_POST["format"]!="sql"){echo"\xef\xbb\xbf";if($N)dump_csv(array_keys(fields($O)));}elseif($N){$db=create_sql($O,$_POST["auto_increment"]);if($db){if($N=="DROP+CREATE")echo"DROP ".($Kc?"VIEW":"TABLE")." IF EXISTS ".table($O).";\n";if($Kc)$db=preg_replace('~^([A-Z =]+) DEFINER=`'.preg_replace('~@(.*)~','`@`(%|\\1)',logged_user()).'`~','\\1',$db);echo($N!="CREATE+ALTER"?$db:($Kc?substr_replace($db," OR REPLACE",6,0):substr_replace($db," IF NOT EXISTS",12,0))).";\n\n";}if($N=="CREATE+ALTER"&&!$Kc){$E="SELECT COLUMN_NAME, COLUMN_DEFAULT, IS_NULLABLE, COLLATION_NAME, COLUMN_TYPE, EXTRA, COLUMN_COMMENT FROM information_schema.COLUMNS WHERE TABLE_SCHEMA = DATABASE() AND TABLE_NAME = ".q($O)." ORDER BY ORDINAL_POSITION";echo"DELIMITER ;;
CREATE PROCEDURE adminer_alter (INOUT alter_command text) BEGIN
	DECLARE _column_name, _collation_name, after varchar(64) DEFAULT '';
	DECLARE _column_type, _column_default text;
	DECLARE _is_nullable char(3);
	DECLARE _extra varchar(30);
	DECLARE _column_comment varchar(255);
	DECLARE done, set_after bool DEFAULT 0;
	DECLARE add_columns text DEFAULT '";$m=array();$ta="";foreach(get_rows($E)as$H){$nb=$H["COLUMN_DEFAULT"];$H["default"]=($nb!==null?q($nb):"NULL");$H["after"]=q($ta);$H["alter"]=escape_string(idf_escape($H["COLUMN_NAME"])." $H[COLUMN_TYPE]".($H["COLLATION_NAME"]?" COLLATE $H[COLLATION_NAME]":"").($nb!==null?" DEFAULT ".($nb=="CURRENT_TIMESTAMP"?$nb:$H["default"]):"").($H["IS_NULLABLE"]=="YES"?"":" NOT NULL").($H["EXTRA"]?" $H[EXTRA]":"").($H["COLUMN_COMMENT"]?" COMMENT ".q($H["COLUMN_COMMENT"]):"").($ta?" AFTER ".idf_escape($ta):" FIRST"));echo", ADD $H[alter]";$m[]=$H;$ta=$H["COLUMN_NAME"];}echo"';
	DECLARE columns CURSOR FOR $E;
	DECLARE CONTINUE HANDLER FOR NOT FOUND SET done = 1;
	SET @alter_table = '';
	OPEN columns;
	REPEAT
		FETCH columns INTO _column_name, _column_default, _is_nullable, _collation_name, _column_type, _extra, _column_comment;
		IF NOT done THEN
			SET set_after = 1;
			CASE _column_name";foreach($m
as$H)echo"
				WHEN ".q($H["COLUMN_NAME"])." THEN
					SET add_columns = REPLACE(add_columns, ', ADD $H[alter]', IF(
						_column_default <=> $H[default] AND _is_nullable = '$H[IS_NULLABLE]' AND _collation_name <=> ".(isset($H["COLLATION_NAME"])?"'$H[COLLATION_NAME]'":"NULL")." AND _column_type = ".q($H["COLUMN_TYPE"])." AND _extra = '$H[EXTRA]' AND _column_comment = ".q($H["COLUMN_COMMENT"])." AND after = $H[after]
					, '', ', MODIFY $H[alter]'));";echo"
				ELSE
					SET @alter_table = CONCAT(@alter_table, ', DROP ', _column_name);
					SET set_after = 0;
			END CASE;
			IF set_after THEN
				SET after = _column_name;
			END IF;
		END IF;
	UNTIL done END REPEAT;
	CLOSE columns;
	IF @alter_table != '' OR add_columns != '' THEN
		SET alter_command = CONCAT(alter_command, 'ALTER TABLE ".table($O)."', SUBSTR(CONCAT(add_columns, @alter_table), 2), ';\\n');
	END IF;
END;;
DELIMITER ;
CALL adminer_alter(@adminer_alter);
DROP PROCEDURE adminer_alter;

";}}}function
dumpData($O,$N,$E){global$g,$u;$gd=($u=="sqlite"?0:1048576);if($N){if($_POST["format"]=="sql"&&$N=="TRUNCATE+INSERT")echo
truncate_sql($O).";\n";if($_POST["format"]=="sql")$m=fields($O);$F=$g->query($E,1);if($F){$Hc="";$Ha="";while($H=$F->fetch_assoc()){if($_POST["format"]!="sql"){if($N=="table"){dump_csv(array_keys($H));$N="INSERT";}dump_csv($H);}else{if(!$Hc)$Hc="INSERT INTO ".table($O)." (".implode(", ",array_map('idf_escape',array_keys($H))).") VALUES";foreach($H
as$v=>$W)$H[$v]=($W!==null?(ereg('int|float|double|decimal|bit',$m[$v]["type"])?$W:q($W)):"NULL");$Oe=implode(",\t",$H);if($N=="INSERT+UPDATE"){$L=array();foreach($H
as$v=>$W)$L[]=idf_escape($v)." = $W";echo"$Hc ($Oe) ON DUPLICATE KEY UPDATE ".implode(", ",$L).";\n";}else{$Oe=($gd?"\n":" ")."($Oe)";if(!$Ha)$Ha=$Hc.$Oe;elseif(strlen($Ha)+4+strlen($Oe)<$gd)$Ha.=",$Oe";else{echo"$Ha;\n";$Ha=$Hc.$Oe;}}}}if($_POST["format"]=="sql"&&$N!="INSERT+UPDATE"&&$Ha){$Ha.=";\n";echo$Ha;}}elseif($_POST["format"]=="sql")echo"-- ".str_replace("\n"," ",$g->error)."\n";}}function
dumpFilename($zc){return
friendly_url($zc!=""?$zc:(SERVER!=""?SERVER:"localhost"));}function
dumpHeaders($zc,$td=false){$Wd=$_POST["output"];$Vb=($_POST["format"]=="sql"?"sql":($td?"tar":"csv"));header("Content-Type: ".($Wd=="bz2"?"application/x-bzip":($Wd=="gz"?"application/x-gzip":($Vb=="tar"?"application/x-tar":($Vb=="sql"||$Wd!="file"?"text/plain":"text/csv")."; charset=utf-8"))));if($Wd=="bz2")ob_start('bzcompress',1e6);if($Wd=="gz")ob_start('gzencode',1e6);return$Vb;}function
homepage(){echo'<p>'.($_GET["ns"]==""?'<a href="'.h(ME).'database=">'.'Pozměnit databázi'."</a>\n":""),(support("scheme")?"<a href='".h(ME)."scheme='>".($_GET["ns"]!=""?'Pozměnit schéma':'Vytvořit schéma')."</a>\n":""),($_GET["ns"]!==""?'<a href="'.h(ME).'schema=">'.'Schéma databáze'."</a>\n":""),(support("privileges")?"<a href='".h(ME)."privileges='>".'Oprávnění'."</a>\n":"");return
true;}function
navigation($sd){global$ia,$g,$R,$u,$ub;echo'<h1>
',$this->name(),' <span class="version">',$ia,'</span>
<a href="http://www.adminer.org/#download" id="version">',(version_compare($ia,$_COOKIE["adminer_version"])<0?h($_COOKIE["adminer_version"]):""),'</a>
</h1>
';if($sd=="auth"){$dc=true;foreach((array)$_SESSION["pwds"]as$tb=>$Ye){foreach($Ye
as$K=>$Zf){foreach($Zf
as$U=>$C){if($C!==null){if($dc){echo"<p>\n";$dc=false;}echo"<a href='".h(auth_url($tb,$K,$U))."'>($ub[$tb]) ".h($U.($K!=""?"@$K":""))."</a><br>\n";}}}}}else{$i=$this->databases();echo'<form action="" method="post">
<p class="logout">
';if(DB==""||!$sd){echo"<a href='".h(ME)."sql='".bold(isset($_GET["sql"])).">".'SQL příkaz'."</a>\n";if(support("dump"))echo"<a href='".h(ME)."dump=".urlencode(isset($_GET["table"])?$_GET["table"]:$_GET["select"])."' id='dump'".bold(isset($_GET["dump"])).">".'Export'."</a>\n";}echo'<input type="submit" name="logout" value="Odhlásit">
<input type="hidden" name="token" value="',$R,'">
</p>
</form>
<form action="">
<p>
';hidden_fields_get();echo($i?html_select("db",array(""=>"(".'databáze'.")")+$i,DB,"this.form.submit();"):'<input name="db" value="'.h(DB).'">'),'<input type="submit" value="Vybrat"',($i?" class='hidden'":""),'>
';if($sd!="db"&&DB!=""&&$g->select_db(DB)){if(support("scheme")){echo"<br>".html_select("ns",array(""=>"(".'schéma'.")")+schemas(),$_GET["ns"],"this.form.submit();");if($_GET["ns"]!="")set_schema($_GET["ns"]);}if($_GET["ns"]!==""&&!$sd){echo'<p><a href="'.h(ME).'create="'.bold($_GET["create"]==="").">".'Vytvořit novou tabulku'."</a>\n";$Q=tables_list();if(!$Q)echo"<p class='message'>".'Žádné tabulky.'."\n";else{$this->tablesPrint($Q);$Zc=array();foreach($Q
as$O=>$S)$Zc[]=preg_quote($O,'/');echo"<script type='text/javascript'>\n","var jushLinks = { $u: [ '".js_escape(ME)."table=\$&', /\\b(".implode("|",$Zc).")\\b/g ] };\n";foreach(array("bac","bra","sqlite_quo","mssql_bra")as$W)echo"jushLinks.$W = jushLinks.$u;\n";echo"</script>\n";}}}echo(isset($_GET["sql"])?'<input type="hidden" name="sql" value="">':(isset($_GET["schema"])?'<input type="hidden" name="schema" value="">':(isset($_GET["dump"])?'<input type="hidden" name="dump" value="">':""))),"</p></form>\n";}}function
tablesPrint($Q){echo"<p id='tables'>\n";foreach($Q
as$O=>$S){echo'<a href="'.h(ME).'select='.urlencode($O).'"'.bold($_GET["select"]==$O).">".'vypsat'."</a> ",'<a href="'.h(ME).'table='.urlencode($O).'"'.bold($_GET["table"]==$O)." title='".'Zobrazit strukturu'."'>".$this->tableName(array("Name"=>$O))."</a><br>\n";}}}$b=(function_exists('adminer_object')?adminer_object():new
Adminer);if($b->operators===null)$b->operators=$Jd;function
page_header($Bf,$k="",$Ga=array(),$Cf=""){global$ca,$b,$g,$ub;header("Content-Type: text/html; charset=utf-8");if($b->headers()){header("X-Frame-Options: deny");header("X-XSS-Protection: 0");}$Df=$Bf.($Cf!=""?": ".h($Cf):"");$Ef=strip_tags($Df.(SERVER!=""&&SERVER!="localhost"?h(" - ".SERVER):"")." - ".$b->name());echo'<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN">
<html lang="cs" dir="ltr">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<meta http-equiv="Content-Script-Type" content="text/javascript">
<meta name="robots" content="noindex">
<title>',$Ef,'</title>
<link rel="stylesheet" type="text/css" href="',h(preg_replace("~\\?.*~","",ME))."?file=default.css&amp;version=3.4.0",'">
<script type="text/javascript" src="',h(preg_replace("~\\?.*~","",ME))."?file=functions.js&amp;version=3.4.0",'"></script>
';if($b->head()){echo'<link rel="shortcut icon" type="image/x-icon" href="',h(preg_replace("~\\?.*~","",ME))."?file=favicon.ico&amp;version=3.4.0",'" id="favicon">
';if(file_exists("adminer.css")){echo'<link rel="stylesheet" type="text/css" href="adminer.css">
';}}echo'
<body class="ltr nojs" onkeydown="bodyKeydown(event);" onload="bodyLoad(\'',(is_object($g)?substr($g->server_info,0,3):""),'\');',(isset($_COOKIE["adminer_version"])?"":" verifyVersion();"),'">
<script type="text/javascript">
document.body.className = document.body.className.replace(/ nojs/, \' js\');
</script>

<div id="content">
';if($Ga!==null){$y=substr(preg_replace('~(username|db|ns)=[^&]*&~','',ME),0,-1);echo'<p id="breadcrumb"><a href="'.h($y?$y:".").'">'.$ub[DRIVER].'</a> &raquo; ';$y=substr(preg_replace('~(db|ns)=[^&]*&~','',ME),0,-1);$K=(SERVER!=""?h(SERVER):'Server');if($Ga===false)echo"$K\n";else{echo"<a href='".($y?h($y):".")."' accesskey='1' title='Alt+Shift+1'>$K</a> &raquo; ";if($_GET["ns"]!=""||(DB!=""&&is_array($Ga)))echo'<a href="'.h($y."&db=".urlencode(DB).(support("scheme")?"&ns=":"")).'">'.h(DB).'</a> &raquo; ';if(is_array($Ga)){if($_GET["ns"]!="")echo'<a href="'.h(substr(ME,0,-1)).'">'.h($_GET["ns"]).'</a> &raquo; ';foreach($Ga
as$v=>$W){$pb=(is_array($W)?$W[1]:$W);if($pb!="")echo'<a href="'.h(ME."$v=").urlencode(is_array($W)?$W[0]:$W).'">'.h($pb).'</a> &raquo; ';}}echo"$Bf\n";}}echo"<h2>$Df</h2>\n";restart_session();$Xf=preg_replace('~^[^?]*~','',$_SERVER["REQUEST_URI"]);$pd=$_SESSION["messages"][$Xf];if($pd){echo"<div class='message'>".implode("</div>\n<div class='message'>",$pd)."</div>\n";unset($_SESSION["messages"][$Xf]);}$i=&get_session("dbs");if(DB!=""&&$i&&!in_array(DB,$i,true))$i=null;if($k)echo"<div class='error'>$k</div>\n";define("PAGE_HEADER",1);}function
page_footer($sd=""){global$b;echo'</div>

<div id="menu">
';$b->navigation($sd);echo'</div>
';}function
int32($vd){while($vd>=2147483648)$vd-=4294967296;while($vd<=-2147483649)$vd+=4294967296;return(int)$vd;}function
long2str($V,$fg){$Oe='';foreach($V
as$W)$Oe.=pack('V',$W);if($fg)return
substr($Oe,0,end($V));return$Oe;}function
str2long($Oe,$fg){$V=array_values(unpack('V*',str_pad($Oe,4*ceil(strlen($Oe)/4),"\0")));if($fg)$V[]=strlen($Oe);return$V;}function
xxtea_mx($jg,$ig,$lf,$Nc){return
int32((($jg>>5&0x7FFFFFF)^$ig<<2)+(($ig>>3&0x1FFFFFFF)^$jg<<4))^int32(($lf^$ig)+($Nc^$jg));}function
encrypt_string($gf,$v){if($gf=="")return"";$v=array_values(unpack("V*",pack("H*",md5($v))));$V=str2long($gf,true);$vd=count($V)-1;$jg=$V[$vd];$ig=$V[0];$D=floor(6+52/($vd+1));$lf=0;while($D-->0){$lf=int32($lf+0x9E3779B9);$zb=$lf>>2&3;for($Xd=0;$Xd<$vd;$Xd++){$ig=$V[$Xd+1];$ud=xxtea_mx($jg,$ig,$lf,$v[$Xd&3^$zb]);$jg=int32($V[$Xd]+$ud);$V[$Xd]=$jg;}$ig=$V[0];$ud=xxtea_mx($jg,$ig,$lf,$v[$Xd&3^$zb]);$jg=int32($V[$vd]+$ud);$V[$vd]=$jg;}return
long2str($V,false);}function
decrypt_string($gf,$v){if($gf=="")return"";$v=array_values(unpack("V*",pack("H*",md5($v))));$V=str2long($gf,false);$vd=count($V)-1;$jg=$V[$vd];$ig=$V[0];$D=floor(6+52/($vd+1));$lf=int32($D*0x9E3779B9);while($lf){$zb=$lf>>2&3;for($Xd=$vd;$Xd>0;$Xd--){$jg=$V[$Xd-1];$ud=xxtea_mx($jg,$ig,$lf,$v[$Xd&3^$zb]);$ig=int32($V[$Xd]-$ud);$V[$Xd]=$ig;}$jg=$V[$vd];$ud=xxtea_mx($jg,$ig,$lf,$v[$Xd&3^$zb]);$ig=int32($V[0]-$ud);$V[0]=$ig;$lf=int32($lf-0x9E3779B9);}return
long2str($V,true);}$g='';$R=$_SESSION["token"];if(!$_SESSION["token"])$_SESSION["token"]=rand(1,1e6);$he=array();if($_COOKIE["adminer_permanent"]){foreach(explode(" ",$_COOKIE["adminer_permanent"])as$W){list($v)=explode(":",$W);$he[$v]=$W;}}$ya=$_POST["auth"];if($ya){session_regenerate_id();$_SESSION["pwds"][$ya["driver"]][$ya["server"]][$ya["username"]]=$ya["password"];if($ya["permanent"]){$v=base64_encode($ya["driver"])."-".base64_encode($ya["server"])."-".base64_encode($ya["username"]);$re=$b->permanentLogin();$he[$v]="$v:".base64_encode($re?encrypt_string($ya["password"],$re):"");cookie("adminer_permanent",implode(" ",$he));}if(count($_POST)==1||DRIVER!=$ya["driver"]||SERVER!=$ya["server"]||$_GET["username"]!==$ya["username"]||DB!=$ya["db"])redirect(auth_url($ya["driver"],$ya["server"],$ya["username"],$ya["db"]));}elseif($_POST["logout"]){if($R&&$_POST["token"]!=$R){page_header('Odhlásit','Neplatný token CSRF. Odešlete formulář znovu.');page_footer("db");exit;}else{foreach(array("pwds","dbs","queries")as$v)set_session($v,null);$v=base64_encode(DRIVER)."-".base64_encode(SERVER)."-".base64_encode($_GET["username"]);if($he[$v]){unset($he[$v]);cookie("adminer_permanent",implode(" ",$he));}redirect(substr(preg_replace('~(username|db|ns)=[^&]*&~','',ME),0,-1),'Odhlášení proběhlo v pořádku.');}}elseif($he&&!$_SESSION["pwds"]){session_regenerate_id();$re=$b->permanentLogin();foreach($he
as$v=>$W){list(,$Na)=explode(":",$W);list($tb,$K,$U)=array_map('base64_decode',explode("-",$v));$_SESSION["pwds"][$tb][$K][$U]=decrypt_string(base64_decode($Na),$re);}}function
auth_error($Pb=null){global$g,$b,$R;$Ze=session_name();$k="";if(!$_COOKIE[$Ze]&&$_GET[$Ze]&&ini_bool("session.use_only_cookies"))$k='Session proměnné musí být povolené.';elseif(isset($_GET["username"])){if(($_COOKIE[$Ze]||$_GET[$Ze])&&!$R)$k='Session vypršela, přihlašte se prosím znovu.';else{$C=&get_session("pwds");if($C!==null){$k=h($Pb?$Pb->getMessage():(is_string($g)?$g:'Neplatné přihlašovací údaje.'));$C=null;}}}page_header('Přihlásit se',$k,null);echo"<form action='' method='post'>\n";$b->loginForm();echo"<div>";hidden_fields($_POST,array("auth"));echo"</div>\n","</form>\n";page_footer("auth");}if(isset($_GET["username"])){if(!class_exists("Min_DB")){unset($_SESSION["pwds"][DRIVER]);page_header('Žádné rozšíření',sprintf('Není dostupné žádné z podporovaných PHP rozšíření (%s).',implode(", ",$me)),false);page_footer("auth");exit;}$g=connect();}if(is_string($g)||!$b->login($_GET["username"],get_session("pwds"))){auth_error();exit;}$R=$_SESSION["token"];if($ya&&$_POST["token"])$_POST["token"]=$R;$k=($_POST?($_POST["token"]==$R?"":'Neplatný token CSRF. Odešlete formulář znovu.'):($_SERVER["REQUEST_METHOD"]!="POST"?"":sprintf('Příliš velká POST data. Zmenšete data nebo zvyšte hodnotu konfigurační direktivy %s.','"post_max_size"')));function
connect_error(){global$b,$g,$R,$k,$ub;$i=array();if(DB!="")page_header('Databáze'.": ".h(DB),'Nesprávná databáze.',true);else{if($_POST["db"]&&!$k)queries_redirect(substr(ME,0,-1),'Databáze byly odstraněny.',drop_databases($_POST["db"]));page_header('Vybrat databázi',$k,false);echo"<p><a href='".h(ME)."database='>".'Vytvořit novou databázi'."</a>\n";foreach(array('privileges'=>'Oprávnění','processlist'=>'Seznam procesů','variables'=>'Proměnné','status'=>'Stav',)as$v=>$W){if(support($v))echo"<a href='".h(ME)."$v='>$W</a>\n";}echo"<p>".sprintf('Verze %s: %s přes PHP rozšíření %s',$ub[DRIVER],"<b>$g->server_info</b>","<b>$g->extension</b>")."\n","<p>".sprintf('Přihlášen jako: %s',"<b>".h(logged_user())."</b>")."\n";if($_GET["refresh"])set_session("dbs",null);$i=$b->databases();if($i){$Re=support("scheme");$Qa=collations();echo"<form action='' method='post'>\n","<table cellspacing='0' class='checkable' onclick='tableClick(event);'>\n","<thead><tr><td>&nbsp;<th>".'Databáze'."<td>".'Porovnávání'."<td>".'Tabulky'."</thead>\n";foreach($i
as$j){$Je=h(ME)."db=".urlencode($j);echo"<tr".odd()."><td>".checkbox("db[]",$j,in_array($j,(array)$_POST["db"])),"<th><a href='$Je'>".h($j)."</a>","<td><a href='$Je".($Re?"&amp;ns=":"")."&amp;database=' title='".'Pozměnit databázi'."'>".nbsp(db_collation($j,$Qa))."</a>","<td align='right'><a href='$Je&amp;schema=' id='tables-".h($j)."' title='".'Schéma databáze'."'>?</a>","\n";}echo"</table>\n","<script type='text/javascript'>tableCheck();</script>\n","<p><input type='submit' name='drop' value='".'Odstranit'."'".confirm("formChecked(this, /db/)").">\n","<input type='hidden' name='token' value='$R'>\n","<a href='".h(ME)."refresh=1'>".'Obnovit'."</a>\n","</form>\n";}}page_footer("db");if($i)echo"<script type='text/javascript'>ajaxSetHtml('".js_escape(ME)."script=connect');</script>\n";}if(isset($_GET["status"]))$_GET["variables"]=$_GET["status"];if(!(DB!=""?$g->select_db(DB):isset($_GET["sql"])||isset($_GET["dump"])||isset($_GET["database"])||isset($_GET["processlist"])||isset($_GET["privileges"])||isset($_GET["user"])||isset($_GET["variables"])||$_GET["script"]=="connect")){if(DB!="")set_session("dbs",null);connect_error();exit;}if(support("scheme")&&DB!=""&&$_GET["ns"]!==""){if(!isset($_GET["ns"]))redirect(preg_replace('~ns=[^&]*&~','',ME)."ns=".get_schema());if(!set_schema($_GET["ns"])){page_header('Schéma'.": ".h($_GET["ns"]),'Nesprávné schéma.',true);page_footer("ns");exit;}}function
select($F,$h=null,$yc="",$Qd=array()){$Zc=array();$t=array();$f=array();$Ea=array();$T=array();$G=array();odd('');for($p=0;$H=$F->fetch_row();$p++){if(!$p){echo"<table cellspacing='0' class='nowrap'>\n","<thead><tr>";for($Lc=0;$Lc<count($H);$Lc++){$l=$F->fetch_field();$_=$l->name;$Pd=$l->orgtable;$Od=$l->orgname;$G[$l->table]=$Pd;if($yc)$Zc[$Lc]=($_=="table"?"table=":($_=="possible_keys"?"indexes=":null));elseif($Pd!=""){if(!isset($t[$Pd])){$t[$Pd]=array();foreach(indexes($Pd,$h)as$s){if($s["type"]=="PRIMARY"){$t[$Pd]=array_flip($s["columns"]);break;}}$f[$Pd]=$t[$Pd];}if(isset($f[$Pd][$Od])){unset($f[$Pd][$Od]);$t[$Pd][$Od]=$Lc;$Zc[$Lc]=$Pd;}}if($l->charsetnr==63)$Ea[$Lc]=true;$T[$Lc]=$l->type;$_=h($_);echo"<th".($Pd!=""||$l->name!=$Od?" title='".h(($Pd!=""?"$Pd.":"").$Od)."'":"").">".($yc?"<a href='$yc".strtolower($_)."' target='_blank' rel='noreferrer'>$_</a>":$_);}echo"</thead>\n";}echo"<tr".odd().">";foreach($H
as$v=>$W){if($W===null)$W="<i>NULL</i>";elseif($Ea[$v]&&!is_utf8($W))$W="<i>".lang(array('%d bajt','%d bajty','%d bajtů'),strlen($W))."</i>";elseif(!strlen($W))$W="&nbsp;";else{$W=h($W);if($T[$v]==254)$W="<code>$W</code>";}if(isset($Zc[$v])&&!$f[$Zc[$v]]){if($yc){$O=$H[array_search("table=",$Zc)];$y=$Zc[$v].urlencode($Qd[$O]!=""?$Qd[$O]:$O);}else{$y="edit=".urlencode($Zc[$v]);foreach($t[$Zc[$v]]as$Oa=>$Lc)$y.="&where".urlencode("[".bracket_escape($Oa)."]")."=".urlencode($H[$Lc]);}$W="<a href='".h(ME.$y)."'>$W</a>";}echo"<td>$W";}}echo($p?"</table>":"<p class='message'>".'Žádné řádky.')."\n";return$G;}function
referencable_primary($Ue){$G=array();foreach(table_status()as$pf=>$O){if($pf!=$Ue&&fk_support($O)){foreach(fields($pf)as$l){if($l["primary"]){if($G[$pf]){unset($G[$pf]);break;}$G[$pf]=$l;}}}}return$G;}function
textarea($_,$X,$I=10,$Ra=80){echo"<textarea name='$_' rows='$I' cols='$Ra' class='sqlarea' spellcheck='false' wrap='off' onkeydown='return textareaKeydown(this, event);'>";if(is_array($X)){foreach($X
as$W)echo
h($W[0])."\n\n\n";}else
echo
h($X);echo"</textarea>";}function
format_time($df,$Fb){return" <span class='time'>(".sprintf('%.3f s',max(0,array_sum(explode(" ",$Fb))-array_sum(explode(" ",$df)))).")</span>";}function
edit_type($v,$l,$Qa,$hc=array()){global$hf,$T,$Vf,$Fd;echo'<td><select name="',$v,'[type]" class="type" onfocus="lastType = selectValue(this);" onchange="editingTypeChange(this);">',optionlist((!$l["type"]||isset($T[$l["type"]])?array():array($l["type"]))+$hf+($hc?array('Cizí klíče'=>$hc):array()),$l["type"]),'</select>
<td><input name="',$v,'[length]" value="',h($l["length"]),'" size="3" onfocus="editingLengthFocus(this);"><td class="options">',"<select name='$v"."[collation]'".(ereg('(char|text|enum|set)$',$l["type"])?"":" class='hidden'").'><option value="">('.'porovnávání'.')'.optionlist($Qa,$l["collation"]).'</select>',($Vf?"<select name='$v"."[unsigned]'".(!$l["type"]||ereg('(int|float|double|decimal)$',$l["type"])?"":" class='hidden'").'><option>'.optionlist($Vf,$l["unsigned"]).'</select>':''),($hc?"<select name='$v"."[on_delete]'".(ereg("`",$l["type"])?"":" class='hidden'")."><option value=''>(".'Při smazání'.")".optionlist(explode("|",$Fd),$l["on_delete"])."</select> ":" ");}function
process_length($w){global$Ib;return(preg_match("~^\\s*(?:$Ib)(?:\\s*,\\s*(?:$Ib))*\\s*\$~",$w)&&preg_match_all("~$Ib~",$w,$ed)?implode(",",$ed[0]):preg_replace('~[^0-9,+-]~','',$w));}function
process_type($l,$Pa="COLLATE"){global$Vf;return" $l[type]".($l["length"]!=""?"(".process_length($l["length"]).")":"").(ereg('int|float|double|decimal',$l["type"])&&in_array($l["unsigned"],$Vf)?" $l[unsigned]":"").(ereg('char|text|enum|set',$l["type"])&&$l["collation"]?" $Pa ".q($l["collation"]):"");}function
process_field($l,$Nf){return
array(idf_escape(trim($l["field"])),process_type($Nf),($l["null"]?" NULL":" NOT NULL"),(isset($l["default"])?" DEFAULT ".(($l["type"]=="timestamp"&&eregi('^CURRENT_TIMESTAMP$',$l["default"]))||($l["type"]=="bit"&&ereg("^([0-9]+|b'[0-1]+')\$",$l["default"]))?$l["default"]:q($l["default"])):""),($l["on_update"]?" ON UPDATE $l[on_update]":""),(support("comment")&&$l["comment"]!=""?" COMMENT ".q($l["comment"]):""),($l["auto_increment"]?auto_increment():null),);}function
type_class($S){foreach(array('char'=>'text','date'=>'time|year','binary'=>'blob','enum'=>'set',)as$v=>$W){if(ereg("$v|$W",$S))return" class='$v'";}}function
edit_fields($m,$Qa,$S="TABLE",$va=0,$hc=array(),$Va=false){global$Fc;echo'<thead><tr class="wrap">
';if($S=="PROCEDURE"){echo'<td>&nbsp;';}echo'<th>',($S=="TABLE"?'Název sloupce':'Název parametru'),'<td>Typ<textarea id="enum-edit" rows="4" cols="12" wrap="off" style="display: none;" onblur="editingLengthBlur(this);"></textarea>
<td>Délka
<td>Volby
';if($S=="TABLE"){echo'<td>NULL
<td><input type="radio" name="auto_increment_col" value=""><acronym title="Auto Increment">AI</acronym>
<td',($_POST["defaults"]?"":" class='hidden'"),'>Výchozí hodnoty
',(support("comment")?"<td".($Va?"":" class='hidden'").">".'Komentář':"");}echo'<td>',"<input type='image' name='add[".(support("move_col")?0:count($m))."]' src='".h(preg_replace("~\\?.*~","",ME))."?file=plus.gif&amp;version=3.4.0' alt='+' title='".'Přidat další'."'>",'<script type="text/javascript">row_count = ',count($m),';</script>
</thead>
<tbody onkeydown="return editingKeydown(event);">
';foreach($m
as$p=>$l){$p++;$Rd=$l[($_POST?"orig":"field")];$rb=(isset($_POST["add"][$p-1])||(isset($l["field"])&&!$_POST["drop_col"][$p]))&&(support("drop_col")||$Rd=="");echo'<tr',($rb?"":" style='display: none;'"),'>
',($S=="PROCEDURE"?"<td>".html_select("fields[$p][inout]",explode("|",$Fc),$l["inout"]):""),'<th>';if($rb){echo'<input name="fields[',$p,'][field]" value="',h($l["field"]),'" onchange="',($l["field"]!=""||count($m)>1?"":"editingAddRow(this, $va); "),'editingNameChange(this);" maxlength="64">';}echo'<input type="hidden" name="fields[',$p,'][orig]" value="',h($Rd),'">
';edit_type("fields[$p]",$l,$Qa,$hc);if($S=="TABLE"){echo'<td>',checkbox("fields[$p][null]",1,$l["null"]),'<td><input type="radio" name="auto_increment_col" value="',$p,'"';if($l["auto_increment"]){echo' checked';}?> onclick="var field = this.form['fields[' + this.value + '][field]']; if (!field.value) { field.value = 'id'; field.onchange(); }">
<td<?php echo($_POST["defaults"]?"":" class='hidden'"),'>',checkbox("fields[$p][has_default]",1,$l["has_default"]),'<input name="fields[',$p,'][default]" value="',h($l["default"]),'" onchange="this.previousSibling.checked = true;">
',(support("comment")?"<td".($Va?"":" class='hidden'")."><input name='fields[$p][comment]' value='".h($l["comment"])."' maxlength='255'>":"");}echo"<td>",(support("move_col")?"<input type='image' name='add[$p]' src='".h(preg_replace("~\\?.*~","",ME))."?file=plus.gif&amp;version=3.4.0' alt='+' title='".'Přidat další'."' onclick='return !editingAddRow(this, $va, 1);'>&nbsp;"."<input type='image' name='up[$p]' src='".h(preg_replace("~\\?.*~","",ME))."?file=up.gif&amp;version=3.4.0' alt='^' title='".'Přesunout nahoru'."'>&nbsp;"."<input type='image' name='down[$p]' src='".h(preg_replace("~\\?.*~","",ME))."?file=down.gif&amp;version=3.4.0' alt='v' title='".'Přesunout dolů'."'>&nbsp;":""),($Rd==""||support("drop_col")?"<input type='image' name='drop_col[$p]' src='".h(preg_replace("~\\?.*~","",ME))."?file=cross.gif&amp;version=3.4.0' alt='x' title='".'Odebrat'."' onclick='return !editingRemoveRow(this);'>":""),"\n";}}function
process_fields(&$m){ksort($m);$A=0;if($_POST["up"]){$Rc=0;foreach($m
as$v=>$l){if(key($_POST["up"])==$v){unset($m[$v]);array_splice($m,$Rc,0,array($l));break;}if(isset($l["field"]))$Rc=$A;$A++;}}if($_POST["down"]){$jc=false;foreach($m
as$v=>$l){if(isset($l["field"])&&$jc){unset($m[key($_POST["down"])]);array_splice($m,$A,0,array($jc));break;}if(key($_POST["down"])==$v)$jc=$l;$A++;}}$m=array_values($m);if($_POST["add"])array_splice($m,key($_POST["add"]),0,array(array()));}function
normalize_enum($z){return"'".str_replace("'","''",addcslashes(stripcslashes(str_replace($z[0][0].$z[0][0],$z[0][0],substr($z[0],1,-1))),'\\'))."'";}function
grant($pc,$te,$f,$Ed){if(!$te)return
true;if($te==array("ALL PRIVILEGES","GRANT OPTION"))return($pc=="GRANT"?queries("$pc ALL PRIVILEGES$Ed WITH GRANT OPTION"):queries("$pc ALL PRIVILEGES$Ed")&&queries("$pc GRANT OPTION$Ed"));return
queries("$pc ".preg_replace('~(GRANT OPTION)\\([^)]*\\)~','\\1',implode("$f, ",$te).$f).$Ed);}function
drop_create($vb,$db,$ad,$od,$md,$nd,$_){if($_POST["drop"])return
query_redirect($vb,$ad,$od,true,!$_POST["dropped"]);$wb=$_!=""&&($_POST["dropped"]||queries($vb));$fb=queries($db);if(!queries_redirect($ad,($_!=""?$md:$nd),$fb)&&$wb)redirect(null,$od);return$wb;}function
tar_file($bc,$Za){$G=pack("a100a8a8a8a12a12",$bc,644,0,0,decoct(strlen($Za)),decoct(time()));$Ma=8*32;for($p=0;$p<strlen($G);$p++)$Ma+=ord($G[$p]);$G.=sprintf("%06o",$Ma)."\0 ";return$G.str_repeat("\0",512-strlen($G)).$Za.str_repeat("\0",511-(strlen($Za)+511)%
512);}function
ini_bytes($Ec){$W=ini_get($Ec);switch(strtolower(substr($W,-1))){case'g':$W*=1024;case'm':$W*=1024;case'k':$W*=1024;}return$W;}session_cache_limiter("");if(!ini_bool("session.use_cookies")||@ini_set("session.use_cookies",false)!==false)session_write_close();$Fd="RESTRICT|NO ACTION|CASCADE|SET NULL|SET DEFAULT";$Ib="'(?:''|[^'\\\\]|\\\\.)*+'";$Fc="IN|OUT|INOUT";if(isset($_GET["select"])&&($_POST["edit"]||$_POST["clone"])&&!$_POST["save"])$_GET["edit"]=$_GET["select"];if(isset($_GET["callf"]))$_GET["call"]=$_GET["callf"];if(isset($_GET["function"]))$_GET["procedure"]=$_GET["function"];if(isset($_GET["download"])){$a=$_GET["download"];header("Content-Type: application/octet-stream");header("Content-Disposition: attachment; filename=".friendly_url("$a-".implode("_",$_GET["where"])).".".friendly_url($_GET["field"]));echo$g->result("SELECT".limit(idf_escape($_GET["field"])." FROM ".table($a)," WHERE ".where($_GET),1));exit;}elseif(isset($_GET["table"])){$a=$_GET["table"];$m=fields($a);if(!$m)$k=error();$P=($m?table_status($a):array());page_header(($m&&is_view($P)?'Pohled':'Tabulka').": ".h($a),$k);$b->selectLinks($P);$Ua=$P["Comment"];if($Ua!="")echo"<p>".'Komentář'.": ".h($Ua)."\n";if($m){echo"<table cellspacing='0'>\n","<thead><tr><th>".'Sloupec'."<td>".'Typ'.(support("comment")?"<td>".'Komentář':"")."</thead>\n";foreach($m
as$l){echo"<tr".odd()."><th>".h($l["field"]),"<td title='".h($l["collation"])."'>".h($l["full_type"]).($l["null"]?" <i>NULL</i>":"").($l["auto_increment"]?" <i>".'Auto Increment'."</i>":""),(isset($l["default"])?" [<b>".h($l["default"])."</b>]":""),(support("comment")?"<td>".nbsp($l["comment"]):""),"\n";}echo"</table>\n";if(!is_view($P)){echo"<h3>".'Indexy'."</h3>\n";$t=indexes($a);if($t){echo"<table cellspacing='0'>\n";foreach($t
as$_=>$s){ksort($s["columns"]);$qe=array();foreach($s["columns"]as$v=>$W)$qe[]="<i>".h($W)."</i>".($s["lengths"][$v]?"(".$s["lengths"][$v].")":"");echo"<tr title='".h($_)."'><th>$s[type]<td>".implode(", ",$qe)."\n";}echo"</table>\n";}echo'<p><a href="'.h(ME).'indexes='.urlencode($a).'">'.'Pozměnit indexy'."</a>\n";if(fk_support($P)){echo"<h3>".'Cizí klíče'."</h3>\n";$hc=foreign_keys($a);if($hc){echo"<table cellspacing='0'>\n","<thead><tr><th>".'Zdroj'."<td>".'Cíl'."<td>".'Při smazání'."<td>".'Při změně'.($u!="sqlite"?"<td>&nbsp;":"")."</thead>\n";foreach($hc
as$_=>$n){echo"<tr title='".h($_)."'>","<th><i>".implode("</i>, <i>",array_map('h',$n["source"]))."</i>","<td><a href='".h($n["db"]!=""?preg_replace('~db=[^&]*~',"db=".urlencode($n["db"]),ME):($n["ns"]!=""?preg_replace('~ns=[^&]*~',"ns=".urlencode($n["ns"]),ME):ME))."table=".urlencode($n["table"])."'>".($n["db"]!=""?"<b>".h($n["db"])."</b>.":"").($n["ns"]!=""?"<b>".h($n["ns"])."</b>.":"").h($n["table"])."</a>","(<i>".implode("</i>, <i>",array_map('h',$n["target"]))."</i>)","<td>".nbsp($n["on_delete"])."\n","<td>".nbsp($n["on_update"])."\n";if($u!="sqlite")echo'<td><a href="'.h(ME.'foreign='.urlencode($a).'&name='.urlencode($_)).'">'.'Změnit'.'</a>';}echo"</table>\n";}if($u!="sqlite")echo'<p><a href="'.h(ME).'foreign='.urlencode($a).'">'.'Přidat cizí klíč'."</a>\n";}if(support("trigger")){echo"<h3>".'Triggery'."</h3>\n";$Mf=triggers($a);if($Mf){echo"<table cellspacing='0'>\n";foreach($Mf
as$v=>$W)echo"<tr valign='top'><td>$W[0]<td>$W[1]<th>".h($v)."<td><a href='".h(ME.'trigger='.urlencode($a).'&name='.urlencode($v))."'>".'Změnit'."</a>\n";echo"</table>\n";}echo'<p><a href="'.h(ME).'trigger='.urlencode($a).'">'.'Přidat trigger'."</a>\n";}}}}elseif(isset($_GET["schema"])){page_header('Schéma databáze',"",array(),DB.($_GET["ns"]?".$_GET[ns]":""));$rf=array();$sf=array();$_="adminer_schema";$ea=($_GET["schema"]?$_GET["schema"]:$_COOKIE[($_COOKIE["$_-".DB]?"$_-".DB:$_)]);preg_match_all('~([^:]+):([-0-9.]+)x([-0-9.]+)(_|$)~',$ea,$ed,PREG_SET_ORDER);foreach($ed
as$p=>$z){$rf[$z[1]]=array($z[2],$z[3]);$sf[]="\n\t'".js_escape($z[1])."': [ $z[2], $z[3] ]";}$Ff=0;$Da=-1;$Qe=array();$Ce=array();$Vc=array();foreach(table_status()as$P){if(!isset($P["Engine"]))continue;$je=0;$Qe[$P["Name"]]["fields"]=array();foreach(fields($P["Name"])as$_=>$l){$je+=1.25;$l["pos"]=$je;$Qe[$P["Name"]]["fields"][$_]=$l;}$Qe[$P["Name"]]["pos"]=($rf[$P["Name"]]?$rf[$P["Name"]]:array($Ff,0));foreach($b->foreignKeys($P["Name"])as$W){if(!$W["db"]){$Tc=$Da;if($rf[$P["Name"]][1]||$rf[$W["table"]][1])$Tc=min(floatval($rf[$P["Name"]][1]),floatval($rf[$W["table"]][1]))-1;else$Da-=.1;while($Vc[(string)$Tc])$Tc-=.0001;$Qe[$P["Name"]]["references"][$W["table"]][(string)$Tc]=array($W["source"],$W["target"]);$Ce[$W["table"]][$P["Name"]][(string)$Tc]=$W["target"];$Vc[(string)$Tc]=true;}}$Ff=max($Ff,$Qe[$P["Name"]]["pos"][0]+2.5+$je);}echo'<div id="schema" style="height: ',$Ff,'em;" onselectstart="return false;">
<script type="text/javascript">
var tablePos = {',implode(",",$sf)."\n",'};
var em = document.getElementById(\'schema\').offsetHeight / ',$Ff,';
document.onmousemove = schemaMousemove;
document.onmouseup = function (ev) {
	schemaMouseup(ev, \'',js_escape(DB),'\');
};
</script>
';foreach($Qe
as$_=>$O){echo"<div class='table' style='top: ".$O["pos"][0]."em; left: ".$O["pos"][1]."em;' onmousedown='schemaMousedown(this, event);'>",'<a href="'.h(ME).'table='.urlencode($_).'"><b>'.h($_)."</b></a>";foreach($O["fields"]as$l){$W='<span'.type_class($l["type"]).' title="'.h($l["full_type"].($l["null"]?" NULL":'')).'">'.h($l["field"]).'</span>';echo"<br>".($l["primary"]?"<i>$W</i>":$W);}foreach((array)$O["references"]as$xf=>$De){foreach($De
as$Tc=>$_e){$Uc=$Tc-$rf[$_][1];$p=0;foreach($_e[0]as$af)echo"\n<div class='references' title='".h($xf)."' id='refs$Tc-".($p++)."' style='left: $Uc"."em; top: ".$O["fields"][$af]["pos"]."em; padding-top: .5em;'><div style='border-top: 1px solid Gray; width: ".(-$Uc)."em;'></div></div>";}}foreach((array)$Ce[$_]as$xf=>$De){foreach($De
as$Tc=>$f){$Uc=$Tc-$rf[$_][1];$p=0;foreach($f
as$wf)echo"\n<div class='references' title='".h($xf)."' id='refd$Tc-".($p++)."' style='left: $Uc"."em; top: ".$O["fields"][$wf]["pos"]."em; height: 1.25em; background: url(".h(preg_replace("~\\?.*~","",ME))."?file=arrow.gif) no-repeat right center;&amp;version=3.4.0'><div style='height: .5em; border-bottom: 1px solid Gray; width: ".(-$Uc)."em;'></div></div>";}}echo"\n</div>\n";}foreach($Qe
as$_=>$O){foreach((array)$O["references"]as$xf=>$De){foreach($De
as$Tc=>$_e){$rd=$Ff;$id=-10;foreach($_e[0]as$v=>$af){$ke=$O["pos"][0]+$O["fields"][$af]["pos"];$le=$Qe[$xf]["pos"][0]+$Qe[$xf]["fields"][$_e[1][$v]]["pos"];$rd=min($rd,$ke,$le);$id=max($id,$ke,$le);}echo"<div class='references' id='refl$Tc' style='left: $Tc"."em; top: $rd"."em; padding: .5em 0;'><div style='border-right: 1px solid Gray; margin-top: 1px; height: ".($id-$rd)."em;'></div></div>\n";}}}echo'</div>
<p><a href="',h(ME."schema=".urlencode($ea)),'" id="schema-link">Trvalý odkaz</a>
';}elseif(isset($_GET["dump"])){$a=$_GET["dump"];if($_POST){$bb="";foreach(array("output","format","db_style","routines","events","table_style","auto_increment","triggers","data_style")as$v)$bb.="&$v=".urlencode($_POST[$v]);cookie("adminer_export",substr($bb,1));$Vb=dump_headers(($a!=""?$a:DB),(DB==""||count((array)$_POST["tables"]+(array)$_POST["data"])>1));$Jc=($_POST["format"]=="sql");if($Jc)echo"-- Adminer $ia ".$ub[DRIVER]." dump

".($u!="sql"?"":"SET NAMES utf8;
SET foreign_key_checks = 0;
SET time_zone = ".q($g->result("SELECT @@time_zone")).";
SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO';

");$N=$_POST["db_style"];$i=array(DB);if(DB==""){$i=$_POST["databases"];if(is_string($i))$i=explode("\n",rtrim(str_replace("\r","",$i),"\n"));}foreach((array)$i
as$j){if($g->select_db($j)){if($Jc&&ereg('CREATE',$N)&&($db=$g->result("SHOW CREATE DATABASE ".idf_escape($j),1))){if($N=="DROP+CREATE")echo"DROP DATABASE IF EXISTS ".idf_escape($j).";\n";echo($N=="CREATE+ALTER"?preg_replace('~^CREATE DATABASE ~','\\0IF NOT EXISTS ',$db):$db).";\n";}if($Jc){if($N)echo
use_sql($j).";\n\n";if(in_array("CREATE+ALTER",array($N,$_POST["table_style"])))echo"SET @adminer_alter = '';\n\n";$Vd="";if($_POST["routines"]){foreach(array("FUNCTION","PROCEDURE")as$Ke){foreach(get_rows("SHOW $Ke STATUS WHERE Db = ".q($j),null,"-- ")as$H)$Vd.=($N!='DROP+CREATE'?"DROP $Ke IF EXISTS ".idf_escape($H["Name"]).";;\n":"").$g->result("SHOW CREATE $Ke ".idf_escape($H["Name"]),2).";;\n\n";}}if($_POST["events"]){foreach(get_rows("SHOW EVENTS",null,"-- ")as$H)$Vd.=($N!='DROP+CREATE'?"DROP EVENT IF EXISTS ".idf_escape($H["Name"]).";;\n":"").$g->result("SHOW CREATE EVENT ".idf_escape($H["Name"]),3).";;\n\n";}if($Vd)echo"DELIMITER ;;\n\n$Vd"."DELIMITER ;\n\n";}if($_POST["table_style"]||$_POST["data_style"]){$Y=array();foreach(table_status()as$P){$O=(DB==""||in_array($P["Name"],(array)$_POST["tables"]));$ib=(DB==""||in_array($P["Name"],(array)$_POST["data"]));if($O||$ib){if(!is_view($P)){if($Vb=="tar")ob_start();$b->dumpTable($P["Name"],($O?$_POST["table_style"]:""));if($ib)$b->dumpData($P["Name"],$_POST["data_style"],"SELECT * FROM ".table($P["Name"]));if($Jc&&$_POST["triggers"]&&$O&&($Mf=trigger_sql($P["Name"],$_POST["table_style"])))echo"\nDELIMITER ;;\n$Mf\nDELIMITER ;\n";if($Vb=="tar")echo
tar_file((DB!=""?"":"$j/")."$P[Name].csv",ob_get_clean());elseif($Jc)echo"\n";}elseif($Jc)$Y[]=$P["Name"];}}foreach($Y
as$dg)$b->dumpTable($dg,$_POST["table_style"],true);if($Vb=="tar")echo
pack("x512");}if($N=="CREATE+ALTER"&&$Jc){$E="SELECT TABLE_NAME, ENGINE, TABLE_COLLATION, TABLE_COMMENT FROM information_schema.TABLES WHERE TABLE_SCHEMA = DATABASE()";echo"DELIMITER ;;
CREATE PROCEDURE adminer_alter (INOUT alter_command text) BEGIN
	DECLARE _table_name, _engine, _table_collation varchar(64);
	DECLARE _table_comment varchar(64);
	DECLARE done bool DEFAULT 0;
	DECLARE tables CURSOR FOR $E;
	DECLARE CONTINUE HANDLER FOR NOT FOUND SET done = 1;
	OPEN tables;
	REPEAT
		FETCH tables INTO _table_name, _engine, _table_collation, _table_comment;
		IF NOT done THEN
			CASE _table_name";foreach(get_rows($E)as$H){$Ua=q($H["ENGINE"]=="InnoDB"?preg_replace('~(?:(.+); )?InnoDB free: .*~','\\1',$H["TABLE_COMMENT"]):$H["TABLE_COMMENT"]);echo"
				WHEN ".q($H["TABLE_NAME"])." THEN
					".(isset($H["ENGINE"])?"IF _engine != '$H[ENGINE]' OR _table_collation != '$H[TABLE_COLLATION]' OR _table_comment != $Ua THEN
						ALTER TABLE ".idf_escape($H["TABLE_NAME"])." ENGINE=$H[ENGINE] COLLATE=$H[TABLE_COLLATION] COMMENT=$Ua;
					END IF":"BEGIN END").";";}echo"
				ELSE
					SET alter_command = CONCAT(alter_command, 'DROP TABLE `', REPLACE(_table_name, '`', '``'), '`;\\n');
			END CASE;
		END IF;
	UNTIL done END REPEAT;
	CLOSE tables;
END;;
DELIMITER ;
CALL adminer_alter(@adminer_alter);
DROP PROCEDURE adminer_alter;
";}if(in_array("CREATE+ALTER",array($N,$_POST["table_style"]))&&$Jc)echo"SELECT @adminer_alter;\n";}}if($Jc)echo"-- ".$g->result("SELECT NOW()")."\n";exit;}page_header('Export',"",($_GET["export"]!=""?array("table"=>$_GET["export"]):array()),DB);echo'
<form action="" method="post">
<table cellspacing="0">
';$lb=array('','USE','DROP+CREATE','CREATE');$tf=array('','DROP+CREATE','CREATE');$jb=array('','TRUNCATE+INSERT','INSERT');if($u=="sql"){$lb[]='CREATE+ALTER';$tf[]='CREATE+ALTER';$jb[]='INSERT+UPDATE';}parse_str($_COOKIE["adminer_export"],$H);if(!$H)$H=array("output"=>"text","format"=>"sql","db_style"=>(DB!=""?"":"CREATE"),"table_style"=>"DROP+CREATE","data_style"=>"INSERT");if(!isset($H["events"])){$H["routines"]=$H["events"]=($_GET["dump"]=="");$H["triggers"]=$H["table_style"];}echo"<tr><th>".'Výstup'."<td>".html_select("output",$b->dumpOutput(),$H["output"],0)."\n";echo"<tr><th>".'Formát'."<td>".html_select("format",$b->dumpFormat(),$H["format"],0)."\n";echo($u=="sqlite"?"":"<tr><th>".'Databáze'."<td>".html_select('db_style',$lb,$H["db_style"]).(support("routine")?checkbox("routines",1,$H["routines"],'Procedury a funkce'):"").(support("event")?checkbox("events",1,$H["events"],'Události'):"")),"<tr><th>".'Tabulky'."<td>".html_select('table_style',$tf,$H["table_style"]).checkbox("auto_increment",1,$H["auto_increment"],'Auto Increment').(support("trigger")?checkbox("triggers",1,$H["triggers"],'Triggery'):""),"<tr><th>".'Data'."<td>".html_select('data_style',$jb,$H["data_style"]),'</table>
<p><input type="submit" value="Export">

<table cellspacing="0">
';$oe=array();if(DB!=""){$La=($a!=""?"":" checked");echo"<thead><tr>","<th style='text-align: left;'><label><input type='checkbox' id='check-tables'$La onclick='formCheck(this, /^tables\\[/);'>".'Tabulky'."</label>","<th style='text-align: right;'><label>".'Data'."<input type='checkbox' id='check-data'$La onclick='formCheck(this, /^data\\[/);'></label>","</thead>\n";$Y="";foreach(table_status()as$P){$_=$P["Name"];$ne=ereg_replace("_.*","",$_);$La=($a==""||$a==(substr($a,-1)=="%"?"$ne%":$_));$qe="<tr><td>".checkbox("tables[]",$_,$La,$_,"formUncheck('check-tables');");if(is_view($P))$Y.="$qe\n";else
echo"$qe<td align='right'><label>".($P["Engine"]=="InnoDB"&&$P["Rows"]?"~ ":"").$P["Rows"].checkbox("data[]",$_,$La,"","formUncheck('check-data');")."</label>\n";$oe[$ne]++;}echo$Y;}else{echo"<thead><tr><th style='text-align: left;'><label><input type='checkbox' id='check-databases'".($a==""?" checked":"")." onclick='formCheck(this, /^databases\\[/);'>".'Databáze'."</label></thead>\n";$i=$b->databases();if($i){foreach($i
as$j){if(!information_schema($j)){$ne=ereg_replace("_.*","",$j);echo"<tr><td>".checkbox("databases[]",$j,$a==""||$a=="$ne%",$j,"formUncheck('check-databases');")."</label>\n";$oe[$ne]++;}}}else
echo"<tr><td><textarea name='databases' rows='10' cols='20'></textarea>";}echo'</table>
</form>
';$dc=true;foreach($oe
as$v=>$W){if($v!=""&&$W>1){echo($dc?"<p>":" ")."<a href='".h(ME)."dump=".urlencode("$v%")."'>".h($v)."</a>";$dc=false;}}}elseif(isset($_GET["privileges"])){page_header('Oprávnění');$F=$g->query("SELECT User, Host FROM mysql.".(DB==""?"user":"db WHERE ".q(DB)." LIKE Db")." ORDER BY Host, User");$pc=$F;if(!$F)$F=$g->query("SELECT SUBSTRING_INDEX(CURRENT_USER, '@', 1) AS User, SUBSTRING_INDEX(CURRENT_USER, '@', -1) AS Host");echo"<form action=''><p>\n";hidden_fields_get();echo"<input type='hidden' name='db' value='".h(DB)."'>\n",($pc?"":"<input type='hidden' name='grant' value=''>\n"),"<table cellspacing='0'>\n","<thead><tr><th>".'Uživatel'."<th>".'Server'."<th>&nbsp;</thead>\n";while($H=$F->fetch_assoc())echo'<tr'.odd().'><td>'.h($H["User"])."<td>".h($H["Host"]).'<td><a href="'.h(ME.'user='.urlencode($H["User"]).'&host='.urlencode($H["Host"])).'">'.'Upravit'."</a>\n";if(!$pc||DB!="")echo"<tr".odd()."><td><input name='user'><td><input name='host' value='localhost'><td><input type='submit' value='".'Upravit'."'>\n";echo"</table>\n","</form>\n",'<p><a href="'.h(ME).'user=">'.'Vytvořit uživatele'."</a>";}elseif(isset($_GET["sql"])){if(!$k&&$_POST["export"]){dump_headers("sql");$b->dumpTable("","");$b->dumpData("","table",$_POST["query"]);exit;}restart_session();$wc=&get_session("queries");$vc=&$wc[DB];if(!$k&&$_POST["clear"]){$vc=array();redirect(remove_from_uri("history"));}page_header('SQL příkaz',$k);if(!$k&&$_POST){$lc=false;$E=$_POST["query"];if($_POST["webfile"]){$lc=@fopen((file_exists("adminer.sql")?"adminer.sql":(file_exists("adminer.sql.gz")?"compress.zlib://adminer.sql.gz":"compress.bzip2://adminer.sql.bz2")),"rb");$E=($lc?fread($lc,1e6):false);}elseif($_FILES&&$_FILES["sql_file"]["error"]!=UPLOAD_ERR_NO_FILE)$E=get_file("sql_file",true);if(is_string($E)){if(function_exists('memory_get_usage'))@ini_set("memory_limit",max(ini_bytes("memory_limit"),2*strlen($E)+memory_get_usage()+8e6));if($E!=""&&strlen($E)<1e6){$D=$E.(ereg(";[ \t\r\n]*\$",$E)?"":";");if(!$vc||reset(end($vc))!=$D)$vc[]=array($D,time());}$bf="(?:\\s|/\\*.*\\*/|(?:#|-- )[^\n]*\n|--\n)";if(!ini_bool("session.use_cookies"))session_write_close();$ob=";";$A=0;$Eb=true;$h=connect();if(is_object($h)&&DB!="")$h->select_db(DB);$Ta=0;$Lb=array();$Yc=0;$ae='[\'"'.($u=="sql"?'`#':($u=="sqlite"?'`[':($u=="mssql"?'[':''))).']|/\\*|-- |$'.($u=="pgsql"?'|\\$[^$]*\\$':'');$Gf=microtime();parse_str($_COOKIE["adminer_export"],$pa);$yb=$b->dumpFormat();unset($yb["sql"]);while($E!=""){if(!$A&&preg_match("~^$bf*DELIMITER\\s+(.+)~i",$E,$z)){$ob=$z[1];$E=substr($E,strlen($z[0]));}else{preg_match('('.preg_quote($ob)."\\s*|$ae)",$E,$z,PREG_OFFSET_CAPTURE,$A);list($jc,$je)=$z[0];if(!$jc&&$lc&&!feof($lc))$E.=fread($lc,1e5);else{if(!$jc&&rtrim($E)=="")break;$A=$je+strlen($jc);if($jc&&rtrim($jc)!=$ob){while(preg_match('('.($jc=='/*'?'\\*/':($jc=='['?']':(ereg('^-- |^#',$jc)?"\n":preg_quote($jc)."|\\\\."))).'|$)s',$E,$z,PREG_OFFSET_CAPTURE,$A)){$Oe=$z[0][0];if(!$Oe&&$lc&&!feof($lc))$E.=fread($lc,1e5);else{$A=$z[0][1]+strlen($Oe);if($Oe[0]!="\\")break;}}}else{$Eb=false;$D=substr($E,0,$je);$Ta++;$qe="<pre id='sql-$Ta'><code class='jush-$u'>".shorten_utf8(trim($D),1000)."</code></pre>\n";if(!$_POST["only_errors"]){echo$qe;ob_flush();flush();}$df=microtime();if($g->multi_query($D)&&is_object($h)&&preg_match("~^$bf*USE\\b~isU",$D))$h->query($D);do{$F=$g->store_result();$Fb=microtime();$_f=format_time($df,$Fb).(strlen($D)<1000?" <a href='".h(ME)."sql=".urlencode(trim($D))."'>".'Upravit'."</a>":"");if($g->error){echo($_POST["only_errors"]?$qe:""),"<p class='error'>".'Chyba v dotazu'.": ".error()."\n";$Lb[]=" <a href='#sql-$Ta'>$Ta</a>";if($_POST["error_stops"])break
2;}elseif(is_object($F)){$Qd=select($F,$h);if(!$_POST["only_errors"]){echo"<form action='' method='post'>\n","<p>".($F->num_rows?lang(array('%d řádek','%d řádky','%d řádků'),$F->num_rows):"").$_f;$q="export-$Ta";$Ub=", <a href='#$q' onclick=\"return !toggle('$q');\">".'Export'."</a><span id='$q' class='hidden'>: ".html_select("output",$b->dumpOutput(),$pa["output"])." ".html_select("format",$yb,$pa["format"])."<input type='hidden' name='query' value='".h($D)."'>"." <input type='submit' name='export' value='".'Export'."'><input type='hidden' name='token' value='$R'></span>\n";if($h&&preg_match("~^($bf|\\()*SELECT\\b~isU",$D)&&($Tb=explain($h,$D))){$q="explain-$Ta";echo", <a href='#$q' onclick=\"return !toggle('$q');\">EXPLAIN</a>$Ub","<div id='$q' class='hidden'>\n";select($Tb,$h,($u=="sql"?"http://dev.mysql.com/doc/refman/".substr($g->server_info,0,3)."/en/explain-output.html#explain_":""),$Qd);echo"</div>\n";}else
echo$Ub;echo"</form>\n";}}else{if(preg_match("~^$bf*(CREATE|DROP|ALTER)$bf+(DATABASE|SCHEMA)\\b~isU",$D)){restart_session();set_session("dbs",null);session_write_close();}if(!$_POST["only_errors"])echo"<p class='message' title='".h($g->info)."'>".lang(array('Příkaz proběhl v pořádku, byl změněn %d záznam.','Příkaz proběhl v pořádku, byly změněny %d záznamy.','Příkaz proběhl v pořádku, bylo změněno %d záznamů.'),$g->affected_rows)."$_f\n";}$df=$Fb;}while($g->next_result());$Yc+=substr_count($D.$jc,"\n");$E=substr($E,$A);$A=0;}}}}if($Eb)echo"<p class='message'>".'Žádné příkazy k vykonání.'."\n";elseif($_POST["only_errors"])echo"<p class='message'>".lang(array('%d příkaz proběhl v pořádku.','%d příkazy proběhly v pořádku.','%d příkazů proběhlo v pořádku.'),$Ta-count($Lb)).format_time($Gf,microtime())."\n";elseif($Lb&&$Ta>1)echo"<p class='error'>".'Chyba v dotazu'.": ".implode("",$Lb)."\n";}else
echo"<p class='error'>".upload_error($E)."\n";}echo'
<form action="" method="post" enctype="multipart/form-data" id="form">
<p>';$D=$_GET["sql"];if($_POST)$D=$_POST["query"];elseif($_GET["history"]=="all")$D=$vc;elseif($_GET["history"]!="")$D=$vc[$_GET["history"]][0];textarea("query",$D,20);echo($_POST?"":"<script type='text/javascript'>document.getElementsByTagName('textarea')[0].focus();</script>\n"),"<p>".(ini_bool("file_uploads")?'Nahrání souboru'.': <input type="file" name="sql_file"'.($_FILES&&$_FILES["sql_file"]["error"]!=4?'':' onchange="this.form[\'only_errors\'].checked = true;"').'> (&lt; '.ini_get("upload_max_filesize").'B)':'Nahrávání souborů není povoleno.'),'<p>
<input type="submit" value="Provést" title="Ctrl+Enter">
<input type="hidden" name="token" value="',$R,'">
',checkbox("error_stops",1,$_POST["error_stops"],'Zastavit při chybě')."\n",checkbox("only_errors",1,$_POST["only_errors"],'Zobrazit pouze chyby')."\n";print_fieldset("webfile",'Ze serveru',$_POST["webfile"],"document.getElementById('form')['only_errors'].checked = true; ");$Wa=array();foreach(array("gz"=>"zlib","bz2"=>"bz2")as$v=>$W){if(extension_loaded($W))$Wa[]=".$v";}echo
sprintf('Soubor %s na webovém serveru',"<code>adminer.sql".($Wa?"[".implode("|",$Wa)."]":"")."</code>"),' <input type="submit" name="webfile" value="'.'Spustit soubor'.'">',"</div></fieldset>\n";if($vc){print_fieldset("history",'Historie',$_GET["history"]!="");foreach($vc
as$v=>$W){list($D,$_f)=$W;echo'<a href="'.h(ME."sql=&history=$v").'">'.'Upravit'."</a> <span class='time'>".@date("H:i:s",$_f)."</span> <code class='jush-$u'>".shorten_utf8(ltrim(str_replace("\n"," ",str_replace("\r","",preg_replace('~^(#|-- ).*~m','',$D)))),80,"</code>")."<br>\n";}echo"<input type='submit' name='clear' value='".'Vyčistit'."'>\n","<a href='".h(ME."sql=&history=all")."'>".'Upravit vše'."</a>\n","</div></fieldset>\n";}echo'
</form>
';}elseif(isset($_GET["edit"])){$a=$_GET["edit"];$Z=(isset($_GET["select"])?(count($_POST["check"])==1?where_check($_POST["check"][0]):""):where($_GET));$Wf=(isset($_GET["select"])?$_POST["edit"]:$Z);$m=fields($a);foreach($m
as$_=>$l){if(!isset($l["privileges"][$Wf?"update":"insert"])||$b->fieldName($l)=="")unset($m[$_]);}if($_POST&&!$k&&!isset($_GET["select"])){$ad=$_POST["referer"];if($_POST["insert"])$ad=($Wf?null:$_SERVER["REQUEST_URI"]);elseif(!ereg('^.+&select=.+$',$ad))$ad=ME."select=".urlencode($a);if(isset($_POST["delete"]))query_redirect("DELETE".limit1("FROM ".table($a)," WHERE $Z"),$ad,'Položka byla smazána.');else{$L=array();foreach($m
as$_=>$l){$W=process_input($l);if($W!==false&&$W!==null)$L[idf_escape($_)]=($Wf?"\n".idf_escape($_)." = $W":$W);}if($Wf){if(!$L)redirect($ad);query_redirect("UPDATE".limit1(table($a)." SET".implode(",",$L),"\nWHERE $Z"),$ad,'Položka byla aktualizována.');}else{$F=insert_into($a,$L);$Sc=($F?last_id():0);queries_redirect($ad,sprintf('Položka%s byla vložena.',($Sc?" $Sc":"")),$F);}}}$pf=$b->tableName(table_status($a));page_header(($Wf?'Upravit':'Vložit'),$k,array("select"=>array($a,$pf)),$pf);$H=null;if($_POST["save"])$H=(array)$_POST["fields"];elseif($Z){$J=array();foreach($m
as$_=>$l){if(isset($l["privileges"]["select"]))$J[]=($_POST["clone"]&&$l["auto_increment"]?"'' AS ":(ereg("enum|set",$l["type"])?"1*".idf_escape($_)." AS ":"")).idf_escape($_);}$H=array();if($J){$I=get_rows("SELECT".limit(implode(", ",$J)." FROM ".table($a)," WHERE $Z",(isset($_GET["select"])?2:1)));$H=(isset($_GET["select"])&&count($I)!=1?null:reset($I));}}if($H===false)echo"<p class='error'>".'Žádné řádky.'."\n";echo'
<form action="" method="post" enctype="multipart/form-data" id="form">
';if($m){echo"<table cellspacing='0' onkeydown='return editingKeydown(event);'>\n";foreach($m
as$_=>$l){echo"<tr><th>".$b->fieldName($l);$nb=$_GET["set"][bracket_escape($_)];$X=($H!==null?($H[$_]!=""&&ereg("enum|set",$l["type"])?(is_array($H[$_])?array_sum($H[$_]):+$H[$_]):$H[$_]):(!$Wf&&$l["auto_increment"]?"":(isset($_GET["select"])?false:($nb!==null?$nb:$l["default"]))));if(!$_POST["save"]&&is_string($X))$X=$b->editVal($X,$l);$o=($_POST["save"]?(string)$_POST["function"][$_]:($Wf&&$l["on_update"]=="CURRENT_TIMESTAMP"?"now":($X===false?null:($X!==null?'':'NULL'))));if($l["type"]=="timestamp"&&$X=="CURRENT_TIMESTAMP"){$X="";$o="now";}input($l,$X,$o);echo"\n";}echo"</table>\n";}echo'<p>
';if($m){echo"<input type='submit' value='".'Uložit'."'>\n";if(!isset($_GET["select"]))echo"<input type='submit' name='insert' value='".($Wf?'Uložit a pokračovat v editaci':'Uložit a vložit další')."' title='Ctrl+Shift+Enter'>\n";}echo($Wf?"<input type='submit' name='delete' value='".'Smazat'."' onclick=\"return confirm('".'Opravdu?'."');\">\n":($_POST||!$m?"":"<script type='text/javascript'>document.getElementById('form').getElementsByTagName('td')[1].firstChild.focus();</script>\n"));if(isset($_GET["select"]))hidden_fields(array("check"=>(array)$_POST["check"],"clone"=>$_POST["clone"],"all"=>$_POST["all"]));echo'<input type="hidden" name="referer" value="',h(isset($_POST["referer"])?$_POST["referer"]:$_SERVER["HTTP_REFERER"]),'">
<input type="hidden" name="save" value="1">
<input type="hidden" name="token" value="',$R,'">
</form>
';}elseif(isset($_GET["create"])){$a=$_GET["create"];$be=array('HASH','LINEAR HASH','KEY','LINEAR KEY','RANGE','LIST');$Be=referencable_primary($a);$hc=array();foreach($Be
as$pf=>$l)$hc[str_replace("`","``",$pf)."`".str_replace("`","``",$l["field"])]=$pf;$Td=array();$Ud=array();if($a!=""){$Td=fields($a);$Ud=table_status($a);}if($_POST&&!$_POST["fields"])$_POST["fields"]=array();if($_POST&&!$k&&!$_POST["add"]&&!$_POST["drop_col"]&&!$_POST["up"]&&!$_POST["down"]){if($_POST["drop"])query_redirect("DROP TABLE ".table($a),substr(ME,0,-1),'Tabulka byla odstraněna.');else{$m=array();$fc=array();ksort($_POST["fields"]);$Sd=reset($Td);$ta="FIRST";foreach($_POST["fields"]as$v=>$l){$n=$hc[$l["type"]];$Nf=($n!==null?$Be[$n]:$l);if($l["field"]!=""){if(!$l["has_default"])$l["default"]=null;$nb=eregi_replace(" *on update CURRENT_TIMESTAMP","",$l["default"]);if($nb!=$l["default"]){$l["on_update"]="CURRENT_TIMESTAMP";$l["default"]=$nb;}if($v==$_POST["auto_increment_col"])$l["auto_increment"]=true;$ve=process_field($l,$Nf);if($ve!=process_field($Sd,$Sd))$m[]=array($l["orig"],$ve,$ta);if($n!==null)$fc[idf_escape($l["field"])]=($a!=""?"ADD":" ")." FOREIGN KEY (".idf_escape($l["field"]).") REFERENCES ".table($hc[$l["type"]])." (".idf_escape($Nf["field"]).")".(ereg("^($Fd)\$",$l["on_delete"])?" ON DELETE $l[on_delete]":"");$ta="AFTER ".idf_escape($l["field"]);}elseif($l["orig"]!="")$m[]=array($l["orig"]);if($l["orig"]!="")$Sd=next($Td);}$de="";if(in_array($_POST["partition_by"],$be)){$ee=array();if($_POST["partition_by"]=='RANGE'||$_POST["partition_by"]=='LIST'){foreach(array_filter($_POST["partition_names"])as$v=>$W){$X=$_POST["partition_values"][$v];$ee[]="\nPARTITION ".idf_escape($W)." VALUES ".($_POST["partition_by"]=='RANGE'?"LESS THAN":"IN").($X!=""?" ($X)":" MAXVALUE");}}$de.="\nPARTITION BY $_POST[partition_by]($_POST[partition])".($ee?" (".implode(",",$ee)."\n)":($_POST["partitions"]?" PARTITIONS ".(+$_POST["partitions"]):""));}elseif($a!=""&&support("partitioning"))$de.="\nREMOVE PARTITIONING";$ld='Tabulka byla změněna.';if($a==""){cookie("adminer_engine",$_POST["Engine"]);$ld='Tabulka byla vytvořena.';}$_=trim($_POST["name"]);queries_redirect(ME."table=".urlencode($_),$ld,alter_table($a,$_,$m,$fc,$_POST["Comment"],($_POST["Engine"]&&$_POST["Engine"]!=$Ud["Engine"]?$_POST["Engine"]:""),($_POST["Collation"]&&$_POST["Collation"]!=$Ud["Collation"]?$_POST["Collation"]:""),($_POST["Auto_increment"]!=""?+$_POST["Auto_increment"]:""),$de));}}page_header(($a!=""?'Pozměnit tabulku':'Vytvořit tabulku'),$k,array("table"=>$a),$a);$H=array("Engine"=>$_COOKIE["adminer_engine"],"fields"=>array(array("field"=>"","type"=>(isset($T["int"])?"int":(isset($T["integer"])?"integer":"")))),"partition_names"=>array(""),);if($_POST){$H=$_POST;if($H["auto_increment_col"])$H["fields"][$H["auto_increment_col"]]["auto_increment"]=true;process_fields($H["fields"]);}elseif($a!=""){$H=$Ud;$H["name"]=$a;$H["fields"]=array();if(!$_GET["auto_increment"])$H["Auto_increment"]="";foreach($Td
as$l){$l["has_default"]=isset($l["default"]);if($l["on_update"])$l["default"].=" ON UPDATE $l[on_update]";$H["fields"][]=$l;}if(support("partitioning")){$mc="FROM information_schema.PARTITIONS WHERE TABLE_SCHEMA = ".q(DB)." AND TABLE_NAME = ".q($a);$F=$g->query("SELECT PARTITION_METHOD, PARTITION_ORDINAL_POSITION, PARTITION_EXPRESSION $mc ORDER BY PARTITION_ORDINAL_POSITION DESC LIMIT 1");list($H["partition_by"],$H["partitions"],$H["partition"])=$F->fetch_row();$H["partition_names"]=array();$H["partition_values"]=array();foreach(get_rows("SELECT PARTITION_NAME, PARTITION_DESCRIPTION $mc AND PARTITION_NAME != '' ORDER BY PARTITION_ORDINAL_POSITION")as$Ne){$H["partition_names"][]=$Ne["PARTITION_NAME"];$H["partition_values"][]=$Ne["PARTITION_DESCRIPTION"];}$H["partition_names"][]="";}}$Qa=collations();$kf=floor(extension_loaded("suhosin")?(min(ini_get("suhosin.request.max_vars"),ini_get("suhosin.post.max_vars"))-13)/10:0);if($kf&&count($H["fields"])>$kf)echo"<p class='error'>".h(sprintf('Byl překročen maximální povolený počet polí. Zvyšte prosím %s a %s.','suhosin.post.max_vars','suhosin.request.max_vars'))."\n";$Hb=engines();foreach($Hb
as$Gb){if(!strcasecmp($Gb,$H["Engine"])){$H["Engine"]=$Gb;break;}}echo'
<form action="" method="post" id="form">
<p>
Název tabulky: <input name="name" maxlength="64" value="',h($H["name"]),'">
';if($a==""&&!$_POST){?><script type='text/javascript'>document.getElementById('form')['name'].focus();</script><?php }echo($Hb?html_select("Engine",array(""=>"(".'úložiště'.")")+$Hb,$H["Engine"]):""),' ',($Qa&&!ereg("sqlite|mssql",$u)?html_select("Collation",array(""=>"(".'porovnávání'.")")+$Qa,$H["Collation"]):""),' <input type="submit" value="Uložit">
<table cellspacing="0" id="edit-fields" class="nowrap">
';$Va=($_POST?$_POST["comments"]:$H["Comment"]!="");if(!$_POST&&!$Va){foreach($H["fields"]as$l){if($l["comment"]!=""){$Va=true;break;}}}edit_fields($H["fields"],$Qa,"TABLE",$kf,$hc,$Va);echo'</table>
<p>
Auto Increment: <input name="Auto_increment" size="6" value="',h($H["Auto_increment"]),'">
<label class="jsonly"><input type="checkbox" name="defaults" value="1"',($_POST["defaults"]?" checked":""),' onclick="columnShow(this.checked, 5);">Výchozí hodnoty</label>
',(support("comment")?checkbox("comments",1,$Va,'Komentář',"columnShow(this.checked, 6); toggle('Comment'); if (this.checked) this.form['Comment'].focus();",true).' <input id="Comment" name="Comment" value="'.h($H["Comment"]).'" maxlength="60"'.($Va?'':' class="hidden"').'>':''),'<p>
<input type="submit" value="Uložit">
';if($_GET["create"]!=""){echo'<input type="submit" name="drop" value="Odstranit"',confirm(),'>';}echo'<input type="hidden" name="token" value="',$R,'">
';if(support("partitioning")){$ce=ereg('RANGE|LIST',$H["partition_by"]);print_fieldset("partition",'Rozdělit podle',$H["partition_by"]);echo'<p>
',html_select("partition_by",array(-1=>"")+$be,$H["partition_by"],"partitionByChange(this);"),'(<input name="partition" value="',h($H["partition"]),'">)
Oddíly: <input name="partitions" size="2" value="',h($H["partitions"]),'"',($ce||!$H["partition_by"]?" class='hidden'":""),'>
<table cellspacing="0" id="partition-table"',($ce?"":" class='hidden'"),'>
<thead><tr><th>Název oddílu<th>Hodnoty</thead>
';foreach($H["partition_names"]as$v=>$W){echo'<tr>','<td><input name="partition_names[]" value="'.h($W).'"'.($v==count($H["partition_names"])-1?' onchange="partitionNameChange(this);"':'').'>','<td><input name="partition_values[]" value="'.h($H["partition_values"][$v]).'">';}echo'</table>
</div></fieldset>
';}echo'</form>
';}elseif(isset($_GET["indexes"])){$a=$_GET["indexes"];$Bc=array("PRIMARY","UNIQUE","INDEX");$P=table_status($a);if(eregi("MyISAM|M?aria",$P["Engine"]))$Bc[]="FULLTEXT";$t=indexes($a);if($u=="sqlite"){unset($Bc[0]);unset($t[""]);}if($_POST&&!$k&&!$_POST["add"]){$c=array();foreach($_POST["indexes"]as$s){$_=$s["name"];if(in_array($s["type"],$Bc)){$f=array();$Xc=array();$L=array();ksort($s["columns"]);foreach($s["columns"]as$v=>$e){if($e!=""){$w=$s["lengths"][$v];$L[]=idf_escape($e).($w?"(".(+$w).")":"");$f[]=$e;$Xc[]=($w?$w:null);}}if($f){$Sb=$t[$_];if($Sb){ksort($Sb["columns"]);ksort($Sb["lengths"]);if($s["type"]==$Sb["type"]&&array_values($Sb["columns"])===$f&&(!$Sb["lengths"]||array_values($Sb["lengths"])===$Xc)){unset($t[$_]);continue;}}$c[]=array($s["type"],$_,"(".implode(", ",$L).")");}}}foreach($t
as$_=>$Sb)$c[]=array($Sb["type"],$_,"DROP");if(!$c)redirect(ME."table=".urlencode($a));queries_redirect(ME."table=".urlencode($a),'Indexy byly změněny.',alter_indexes($a,$c));}page_header('Indexy',$k,array("table"=>$a),$a);$m=array_keys(fields($a));$H=array("indexes"=>$t);if($_POST){$H=$_POST;if($_POST["add"]){foreach($H["indexes"]as$v=>$s){if($s["columns"][count($s["columns"])]!="")$H["indexes"][$v]["columns"][]="";}$s=end($H["indexes"]);if($s["type"]||array_filter($s["columns"],'strlen')||array_filter($s["lengths"],'strlen'))$H["indexes"][]=array("columns"=>array(1=>""));}}else{foreach($H["indexes"]as$v=>$s){$H["indexes"][$v]["name"]=$v;$H["indexes"][$v]["columns"][]="";}$H["indexes"][]=array("columns"=>array(1=>""));}echo'
<form action="" method="post">
<table cellspacing="0" class="nowrap">
<thead><tr><th>Typ indexu<th>Sloupec (délka)<th>Název</thead>
';$Lc=1;foreach($H["indexes"]as$s){echo"<tr><td>".html_select("indexes[$Lc][type]",array(-1=>"")+$Bc,$s["type"],($Lc==count($H["indexes"])?"indexesAddRow(this);":1))."<td>";ksort($s["columns"]);$p=1;foreach($s["columns"]as$v=>$e){echo"<span>".html_select("indexes[$Lc][columns][$p]",array(-1=>"")+$m,$e,($p==count($s["columns"])?"indexesAddColumn":"indexesChangeColumn")."(this, '".js_escape($u=="sql"?"":$_GET["indexes"]."_")."');"),"<input name='indexes[$Lc][lengths][$p]' size='2' value='".h($s["lengths"][$v])."'> </span>";$p++;}echo"<td><input name='indexes[$Lc][name]' value='".h($s["name"])."'>\n";$Lc++;}echo'</table>
<p>
<input type="submit" value="Uložit">
<noscript><p><input type="submit" name="add" value="Přidat další"></noscript>
<input type="hidden" name="token" value="',$R,'">
</form>
';}elseif(isset($_GET["database"])){if($_POST&&!$k&&!isset($_POST["add_x"])){restart_session();$_=trim($_POST["name"]);if($_POST["drop"]){$_GET["db"]="";queries_redirect(remove_from_uri("db|database"),'Databáze byla odstraněna.',drop_databases(array(DB)));}elseif(DB!==$_){if(DB!=""){$_GET["db"]=$_;queries_redirect(preg_replace('~db=[^&]*&~','',ME)."db=".urlencode($_),'Databáze byla přejmenována.',rename_database($_,$_POST["collation"]));}else{$i=explode("\n",str_replace("\r","",$_));$if=true;$Rc="";foreach($i
as$j){if(count($i)==1||$j!=""){if(!create_database($j,$_POST["collation"]))$if=false;$Rc=$j;}}queries_redirect(ME."db=".urlencode($Rc),'Databáze byla vytvořena.',$if);}}else{if(!$_POST["collation"])redirect(substr(ME,0,-1));query_redirect("ALTER DATABASE ".idf_escape($_).(eregi('^[a-z0-9_]+$',$_POST["collation"])?" COLLATE $_POST[collation]":""),substr(ME,0,-1),'Databáze byla změněna.');}}page_header(DB!=""?'Pozměnit databázi':'Vytvořit databázi',$k,array(),DB);$Qa=collations();$_=DB;$Pa=null;if($_POST){$_=$_POST["name"];$Pa=$_POST["collation"];}elseif(DB!="")$Pa=db_collation(DB,$Qa);elseif($u=="sql"){foreach(get_vals("SHOW GRANTS")as$pc){if(preg_match('~ ON (`(([^\\\\`]|``|\\\\.)*)%`\\.\\*)?~',$pc,$z)&&$z[1]){$_=stripcslashes(idf_unescape("`$z[2]`"));break;}}}echo'
<form action="" method="post">
<p>
',($_POST["add_x"]||strpos($_,"\n")?'<textarea id="name" name="name" rows="10" cols="40">'.h($_).'</textarea><br>':'<input id="name" name="name" value="'.h($_).'" maxlength="64">')."\n".($Qa?html_select("collation",array(""=>"(".'porovnávání'.")")+$Qa,$Pa):"");?>
<script type='text/javascript'>document.getElementById('name').focus();</script>
<input type="submit" value="Uložit">
<?php
if(DB!="")echo"<input type='submit' name='drop' value='".'Odstranit'."'".confirm().">\n";elseif(!$_POST["add_x"]&&$_GET["db"]=="")echo"<input type='image' name='add' src='".h(preg_replace("~\\?.*~","",ME))."?file=plus.gif&amp;version=3.4.0' alt='+' title='".'Přidat další'."'>\n";echo'<input type="hidden" name="token" value="',$R,'">
</form>
';}elseif(isset($_GET["scheme"])){if($_POST&&!$k){$y=preg_replace('~ns=[^&]*&~','',ME)."ns=";if($_POST["drop"])query_redirect("DROP SCHEMA ".idf_escape($_GET["ns"]),$y,'Schéma bylo odstraněno.');else{$_=trim($_POST["name"]);$y.=urlencode($_);if($_GET["ns"]=="")query_redirect("CREATE SCHEMA ".idf_escape($_),$y,'Schéma bylo vytvořeno.');elseif($_GET["ns"]!=$_)query_redirect("ALTER SCHEMA ".idf_escape($_GET["ns"])." RENAME TO ".idf_escape($_),$y,'Schéma bylo změněno.');else
redirect($y);}}page_header($_GET["ns"]!=""?'Pozměnit schéma':'Vytvořit schéma',$k);$H=$_POST;if(!$H)$H=array("name"=>$_GET["ns"]);echo'
<form action="" method="post">
<p><input id="name" name="name" value="',h($H["name"]);?>">
<script type='text/javascript'>document.getElementById('name').focus();</script>
<input type="submit" value="Uložit">
<?php
if($_GET["ns"]!="")echo"<input type='submit' name='drop' value='".'Odstranit'."'".confirm().">\n";echo'<input type="hidden" name="token" value="',$R,'">
</form>
';}elseif(isset($_GET["call"])){$da=$_GET["call"];page_header('Zavolat'.": ".h($da),$k);$Ke=routine($da,(isset($_GET["callf"])?"FUNCTION":"PROCEDURE"));$Ac=array();$Vd=array();foreach($Ke["fields"]as$p=>$l){if(substr($l["inout"],-3)=="OUT")$Vd[$p]="@".idf_escape($l["field"])." AS ".idf_escape($l["field"]);if(!$l["inout"]||substr($l["inout"],0,2)=="IN")$Ac[]=$p;}if(!$k&&$_POST){$Ia=array();foreach($Ke["fields"]as$v=>$l){if(in_array($v,$Ac)){$W=process_input($l);if($W===false)$W="''";if(isset($Vd[$v]))$g->query("SET @".idf_escape($l["field"])." = $W");}$Ia[]=(isset($Vd[$v])?"@".idf_escape($l["field"]):$W);}$E=(isset($_GET["callf"])?"SELECT":"CALL")." ".idf_escape($da)."(".implode(", ",$Ia).")";echo"<p><code class='jush-$u'>".h($E)."</code> <a href='".h(ME)."sql=".urlencode($E)."'>".'Upravit'."</a>\n";if(!$g->multi_query($E))echo"<p class='error'>".error()."\n";else{$h=connect();if(is_object($h))$h->select_db(DB);do{$F=$g->store_result();if(is_object($F))select($F,$h);else
echo"<p class='message'>".lang(array('Procedura byla zavolána, byl změněn %d záznam.','Procedura byla zavolána, byly změněny %d záznamy.','Procedura byla zavolána, bylo změněno %d záznamů.'),$g->affected_rows)."\n";}while($g->next_result());if($Vd)select($g->query("SELECT ".implode(", ",$Vd)));}}echo'
<form action="" method="post">
';if($Ac){echo"<table cellspacing='0'>\n";foreach($Ac
as$v){$l=$Ke["fields"][$v];$_=$l["field"];echo"<tr><th>".$b->fieldName($l);$X=$_POST["fields"][$_];if($X!=""){if($l["type"]=="enum")$X=+$X;if($l["type"]=="set")$X=array_sum($X);}input($l,$X,(string)$_POST["function"][$_]);echo"\n";}echo"</table>\n";}echo'<p>
<input type="submit" value="Zavolat">
<input type="hidden" name="token" value="',$R,'">
</form>
';}elseif(isset($_GET["foreign"])){$a=$_GET["foreign"];if($_POST&&!$k&&!$_POST["add"]&&!$_POST["change"]&&!$_POST["change-js"]){if($_POST["drop"])query_redirect("ALTER TABLE ".table($a)."\nDROP ".($u=="sql"?"FOREIGN KEY ":"CONSTRAINT ").idf_escape($_GET["name"]),ME."table=".urlencode($a),'Cizí klíč byl odstraněn.');else{$af=array_filter($_POST["source"],'strlen');ksort($af);$wf=array();foreach($af
as$v=>$W)$wf[$v]=$_POST["target"][$v];query_redirect("ALTER TABLE ".table($a).($_GET["name"]!=""?"\nDROP ".($u=="sql"?"FOREIGN KEY ":"CONSTRAINT ").idf_escape($_GET["name"]).",":"")."\nADD FOREIGN KEY (".implode(", ",array_map('idf_escape',$af)).") REFERENCES ".table($_POST["table"])." (".implode(", ",array_map('idf_escape',$wf)).")".(ereg("^($Fd)\$",$_POST["on_delete"])?" ON DELETE $_POST[on_delete]":"").(ereg("^($Fd)\$",$_POST["on_update"])?" ON UPDATE $_POST[on_update]":""),ME."table=".urlencode($a),($_GET["name"]!=""?'Cizí klíč byl změněn.':'Cizí klíč byl vytvořen.'));$k='Zdrojové a cílové sloupce musí mít stejný datový typ, nad cílovými sloupci musí být definován index a odkazovaná data musí existovat.'."<br>$k";}}page_header('Cizí klíč',$k,array("table"=>$a),$a);$H=array("table"=>$a,"source"=>array(""));if($_POST){$H=$_POST;ksort($H["source"]);if($_POST["add"])$H["source"][]="";elseif($_POST["change"]||$_POST["change-js"])$H["target"]=array();}elseif($_GET["name"]!=""){$hc=foreign_keys($a);$H=$hc[$_GET["name"]];$H["source"][]="";}$af=array_keys(fields($a));$wf=($a===$H["table"]?$af:array_keys(fields($H["table"])));$Ae=array();foreach(table_status()as$_=>$P){if(fk_support($P))$Ae[]=$_;}echo'
<form action="" method="post">
<p>
';if($H["db"]==""&&$H["ns"]==""){echo'Cílová tabulka:
',html_select("table",$Ae,$H["table"],"this.form['change-js'].value = '1'; this.form.submit();"),'<input type="hidden" name="change-js" value="">
<noscript><p><input type="submit" name="change" value="Změnit"></noscript>
<table cellspacing="0">
<thead><tr><th>Zdroj<th>Cíl</thead>
';$Lc=0;foreach($H["source"]as$v=>$W){echo"<tr>","<td>".html_select("source[".(+$v)."]",array(-1=>"")+$af,$W,($Lc==count($H["source"])-1?"foreignAddRow(this);":1)),"<td>".html_select("target[".(+$v)."]",$wf,$H["target"][$v]);$Lc++;}echo'</table>
<p>
Při smazání: ',html_select("on_delete",array(-1=>"")+explode("|",$Fd),$H["on_delete"]),' Při změně: ',html_select("on_update",array(-1=>"")+explode("|",$Fd),$H["on_update"]),'<p>
<input type="submit" value="Uložit">
<noscript><p><input type="submit" name="add" value="Přidat sloupec"></noscript>
';}if($_GET["name"]!=""){echo'<input type="submit" name="drop" value="Odstranit"',confirm(),'>';}echo'<input type="hidden" name="token" value="',$R,'">
</form>
';}elseif(isset($_GET["view"])){$a=$_GET["view"];$wb=false;if($_POST&&!$k){$_=trim($_POST["name"]);$wb=drop_create("DROP VIEW ".table($a),"CREATE VIEW ".table($_)." AS\n$_POST[select]",($_POST["drop"]?substr(ME,0,-1):ME."table=".urlencode($_)),'Pohled byl odstraněn.','Pohled byl změněn.','Pohled byl vytvořen.',$a);}page_header(($a!=""?'Pozměnit pohled':'Vytvořit pohled'),$k,array("table"=>$a),$a);$H=$_POST;if(!$H&&$a!=""){$H=view($a);$H["name"]=$a;}echo'
<form action="" method="post">
<p>Název: <input name="name" value="',h($H["name"]),'" maxlength="64">
<p>';textarea("select",$H["select"]);echo'<p>
';if($wb){echo'<input type="hidden" name="dropped" value="1">';}echo'<input type="submit" value="Uložit">
';if($_GET["view"]!=""){echo'<input type="submit" name="drop" value="Odstranit"',confirm(),'>';}echo'<input type="hidden" name="token" value="',$R,'">
</form>
';}elseif(isset($_GET["event"])){$aa=$_GET["event"];$Ic=array("YEAR","QUARTER","MONTH","DAY","HOUR","MINUTE","WEEK","SECOND","YEAR_MONTH","DAY_HOUR","DAY_MINUTE","DAY_SECOND","HOUR_MINUTE","HOUR_SECOND","MINUTE_SECOND");$ff=array("ENABLED"=>"ENABLE","DISABLED"=>"DISABLE","SLAVESIDE_DISABLED"=>"DISABLE ON SLAVE");if($_POST&&!$k){if($_POST["drop"])query_redirect("DROP EVENT ".idf_escape($aa),substr(ME,0,-1),'Událost byla odstraněna.');elseif(in_array($_POST["INTERVAL_FIELD"],$Ic)&&isset($ff[$_POST["STATUS"]])){$Pe="\nON SCHEDULE ".($_POST["INTERVAL_VALUE"]?"EVERY ".q($_POST["INTERVAL_VALUE"])." $_POST[INTERVAL_FIELD]".($_POST["STARTS"]?" STARTS ".q($_POST["STARTS"]):"").($_POST["ENDS"]?" ENDS ".q($_POST["ENDS"]):""):"AT ".q($_POST["STARTS"]))." ON COMPLETION".($_POST["ON_COMPLETION"]?"":" NOT")." PRESERVE";queries_redirect(substr(ME,0,-1),($aa!=""?'Událost byla změněna.':'Událost byla vytvořena.'),queries(($aa!=""?"ALTER EVENT ".idf_escape($aa).$Pe.($aa!=$_POST["EVENT_NAME"]?"\nRENAME TO ".idf_escape($_POST["EVENT_NAME"]):""):"CREATE EVENT ".idf_escape($_POST["EVENT_NAME"]).$Pe)."\n".$ff[$_POST["STATUS"]]." COMMENT ".q($_POST["EVENT_COMMENT"]).rtrim(" DO\n$_POST[EVENT_DEFINITION]",";").";"));}}page_header(($aa!=""?'Pozměnit událost'.": ".h($aa):'Vytvořit událost'),$k);$H=$_POST;if(!$H&&$aa!=""){$I=get_rows("SELECT * FROM information_schema.EVENTS WHERE EVENT_SCHEMA = ".q(DB)." AND EVENT_NAME = ".q($aa));$H=reset($I);}echo'
<form action="" method="post">
<table cellspacing="0">
<tr><th>Název<td><input name="EVENT_NAME" value="',h($H["EVENT_NAME"]),'" maxlength="64">
<tr><th>Začátek<td><input name="STARTS" value="',h("$H[EXECUTE_AT]$H[STARTS]"),'">
<tr><th>Konec<td><input name="ENDS" value="',h($H["ENDS"]),'">
<tr><th>Každých<td><input name="INTERVAL_VALUE" value="',h($H["INTERVAL_VALUE"]),'" size="6"> ',html_select("INTERVAL_FIELD",$Ic,$H["INTERVAL_FIELD"]),'<tr><th>Stav<td>',html_select("STATUS",$ff,$H["STATUS"]),'<tr><th>Komentář<td><input name="EVENT_COMMENT" value="',h($H["EVENT_COMMENT"]),'" maxlength="64">
<tr><th>&nbsp;<td>',checkbox("ON_COMPLETION","PRESERVE",$H["ON_COMPLETION"]=="PRESERVE",'Po dokončení zachovat'),'</table>
<p>';textarea("EVENT_DEFINITION",$H["EVENT_DEFINITION"]);echo'<p>
<input type="submit" value="Uložit">
';if($aa!=""){echo'<input type="submit" name="drop" value="Odstranit"',confirm(),'>';}echo'<input type="hidden" name="token" value="',$R,'">
</form>
';}elseif(isset($_GET["procedure"])){$da=$_GET["procedure"];$Ke=(isset($_GET["function"])?"FUNCTION":"PROCEDURE");$Le=routine_languages();$wb=false;if($_POST&&!$k&&!$_POST["add"]&&!$_POST["drop_col"]&&!$_POST["up"]&&!$_POST["down"]){$L=array();$m=(array)$_POST["fields"];ksort($m);foreach($m
as$l){if($l["field"]!="")$L[]=(ereg("^($Fc)\$",$l["inout"])?"$l[inout] ":"").idf_escape($l["field"]).process_type($l,"CHARACTER SET");}$wb=drop_create("DROP $Ke ".idf_escape($da),"CREATE $Ke ".idf_escape(trim($_POST["name"]))." (".implode(", ",$L).")".(isset($_GET["function"])?" RETURNS".process_type($_POST["returns"],"CHARACTER SET"):"").(in_array($_POST["language"],$Le)?" LANGUAGE $_POST[language]":"").rtrim("\n$_POST[definition]",";").";",substr(ME,0,-1),'Procedura byla odstraněna.','Procedura byla změněna.','Procedura byla vytvořena.',$da);}page_header(($da!=""?(isset($_GET["function"])?'Změnit funkci':'Změnit proceduru').": ".h($da):(isset($_GET["function"])?'Vytvořit funkci':'Vytvořit proceduru')),$k);$Qa=get_vals("SHOW CHARACTER SET");sort($Qa);$H=array("fields"=>array());if($_POST){$H=$_POST;$H["fields"]=(array)$H["fields"];process_fields($H["fields"]);}elseif($da!=""){$H=routine($da,$Ke);$H["name"]=$da;}echo'
<form action="" method="post" id="form">
<p>Název: <input name="name" value="',h($H["name"]),'" maxlength="64">
',($Le?'Jazyk'.": ".html_select("language",$Le,$H["language"]):""),'<table cellspacing="0" class="nowrap">
';edit_fields($H["fields"],$Qa,$Ke);if(isset($_GET["function"])){echo"<tr><td>".'Návratový typ';edit_type("returns",$H["returns"],$Qa);}echo'</table>
<p>';textarea("definition",$H["definition"]);echo'<p>
<input type="submit" value="Uložit">
';if($da!=""){echo'<input type="submit" name="drop" value="Odstranit"',confirm(),'>';}if($wb){echo'<input type="hidden" name="dropped" value="1">';}echo'<input type="hidden" name="token" value="',$R,'">
</form>
';}elseif(isset($_GET["sequence"])){$fa=$_GET["sequence"];if($_POST&&!$k){$y=substr(ME,0,-1);$_=trim($_POST["name"]);if($_POST["drop"])query_redirect("DROP SEQUENCE ".idf_escape($fa),$y,'Sekvence byla odstraněna.');elseif($fa=="")query_redirect("CREATE SEQUENCE ".idf_escape($_),$y,'Sekvence byla vytvořena.');elseif($fa!=$_)query_redirect("ALTER SEQUENCE ".idf_escape($fa)." RENAME TO ".idf_escape($_),$y,'Sekvence byla změněna.');else
redirect($y);}page_header($fa!=""?'Pozměnit sekvenci'.": ".h($fa):'Vytvořit sekvenci',$k);$H=$_POST;if(!$H)$H=array("name"=>$fa);echo'
<form action="" method="post">
<p><input name="name" value="',h($H["name"]),'">
<input type="submit" value="Uložit">
';if($fa!="")echo"<input type='submit' name='drop' value='".'Odstranit'."'".confirm().">\n";echo'<input type="hidden" name="token" value="',$R,'">
</form>
';}elseif(isset($_GET["type"])){$ga=$_GET["type"];if($_POST&&!$k){$y=substr(ME,0,-1);if($_POST["drop"])query_redirect("DROP TYPE ".idf_escape($ga),$y,'Typ byl odstraněn.');else
query_redirect("CREATE TYPE ".idf_escape(trim($_POST["name"]))." $_POST[as]",$y,'Typ byl vytvořen.');}page_header($ga!=""?'Pozměnit typ'.": ".h($ga):'Vytvořit typ',$k);$H=$_POST;if(!$H)$H=array("as"=>"AS ");echo'
<form action="" method="post">
<p>
';if($ga!="")echo"<input type='submit' name='drop' value='".'Odstranit'."'".confirm().">\n";else{echo"<input name='name' value='".h($H['name'])."'>\n";textarea("as",$H["as"]);echo"<p><input type='submit' value='".'Uložit'."'>\n";}echo'<input type="hidden" name="token" value="',$R,'">
</form>
';}elseif(isset($_GET["trigger"])){$a=$_GET["trigger"];$Lf=trigger_options();$Kf=array("INSERT","UPDATE","DELETE");$wb=false;if($_POST&&!$k&&in_array($_POST["Timing"],$Lf["Timing"])&&in_array($_POST["Event"],$Kf)&&in_array($_POST["Type"],$Lf["Type"])){$Af=" $_POST[Timing] $_POST[Event]";$Ed=" ON ".table($a);$wb=drop_create("DROP TRIGGER ".idf_escape($_GET["name"]).($u=="pgsql"?$Ed:""),"CREATE TRIGGER ".idf_escape($_POST["Trigger"]).($u=="mssql"?$Ed.$Af:$Af.$Ed).rtrim(" $_POST[Type]\n$_POST[Statement]",";").";",ME."table=".urlencode($a),'Trigger byl odstraněn.','Trigger byl změněn.','Trigger byl vytvořen.',$_GET["name"]);}page_header(($_GET["name"]!=""?'Změnit trigger'.": ".h($_GET["name"]):'Vytvořit trigger'),$k,array("table"=>$a));$H=$_POST;if(!$H)$H=trigger($_GET["name"])+array("Trigger"=>$a."_bi");echo'
<form action="" method="post" id="form">
<table cellspacing="0">
<tr><th>Čas<td>',html_select("Timing",$Lf["Timing"],$H["Timing"],"if (/^".preg_quote($a,"/")."_[ba][iud]$/.test(this.form['Trigger'].value)) this.form['Trigger'].value = '".js_escape($a)."_' + selectValue(this).charAt(0).toLowerCase() + selectValue(this.form['Event']).charAt(0).toLowerCase();"),'<tr><th>Událost<td>',html_select("Event",$Kf,$H["Event"],"this.form['Timing'].onchange();"),'<tr><th>Typ<td>',html_select("Type",$Lf["Type"],$H["Type"]),'</table>
<p>Název: <input name="Trigger" value="',h($H["Trigger"]),'" maxlength="64">
<p>';textarea("Statement",$H["Statement"]);echo'<p>
<input type="submit" value="Uložit">
';if($_GET["name"]!=""){echo'<input type="submit" name="drop" value="Odstranit"',confirm(),'>';}if($wb){echo'<input type="hidden" name="dropped" value="1">';}echo'<input type="hidden" name="token" value="',$R,'">
</form>
';}elseif(isset($_GET["user"])){$ha=$_GET["user"];$te=array(""=>array("All privileges"=>""));foreach(get_rows("SHOW PRIVILEGES")as$H){foreach(explode(",",($H["Privilege"]=="Grant option"?"":$H["Context"]))as$ab)$te[$ab][$H["Privilege"]]=$H["Comment"];}$te["Server Admin"]+=$te["File access on server"];$te["Databases"]["Create routine"]=$te["Procedures"]["Create routine"];unset($te["Procedures"]["Create routine"]);$te["Columns"]=array();foreach(array("Select","Insert","Update","References")as$W)$te["Columns"][$W]=$te["Tables"][$W];unset($te["Server Admin"]["Usage"]);foreach($te["Tables"]as$v=>$W)unset($te["Databases"][$v]);$xd=array();if($_POST){foreach($_POST["objects"]as$v=>$W)$xd[$W]=(array)$xd[$W]+(array)$_POST["grants"][$v];}$qc=array();$Cd="";if(isset($_GET["host"])&&($F=$g->query("SHOW GRANTS FOR ".q($ha)."@".q($_GET["host"])))){while($H=$F->fetch_row()){if(preg_match('~GRANT (.*) ON (.*) TO ~',$H[0],$z)&&preg_match_all('~ *([^(,]*[^ ,(])( *\\([^)]+\\))?~',$z[1],$ed,PREG_SET_ORDER)){foreach($ed
as$W){if($W[1]!="USAGE")$qc["$z[2]$W[2]"][$W[1]]=true;if(ereg(' WITH GRANT OPTION',$H[0]))$qc["$z[2]$W[2]"]["GRANT OPTION"]=true;}}if(preg_match("~ IDENTIFIED BY PASSWORD '([^']+)~",$H[0],$z))$Cd=$z[1];}}if($_POST&&!$k){$Dd=(isset($_GET["host"])?q($ha)."@".q($_GET["host"]):"''");$yd=q($_POST["user"])."@".q($_POST["host"]);$fe=q($_POST["pass"]);if($_POST["drop"])query_redirect("DROP USER $Dd",ME."privileges=",'Uživatel byl odstraněn.');else{$fb=false;if($Dd!=$yd){$fb=queries(($g->server_info<5?"GRANT USAGE ON *.* TO":"CREATE USER")." $yd IDENTIFIED BY".($_POST["hashed"]?" PASSWORD":"")." $fe");$k=!$fb;}elseif($_POST["pass"]!=$Cd||!$_POST["hashed"])queries("SET PASSWORD FOR $yd = ".($_POST["hashed"]?$fe:"PASSWORD($fe)"));if(!$k){$He=array();foreach($xd
as$Ad=>$pc){if(isset($_GET["grant"]))$pc=array_filter($pc);$pc=array_keys($pc);if(isset($_GET["grant"]))$He=array_diff(array_keys(array_filter($xd[$Ad],'strlen')),$pc);elseif($Dd==$yd){$Bd=array_keys((array)$qc[$Ad]);$He=array_diff($Bd,$pc);$pc=array_diff($pc,$Bd);unset($qc[$Ad]);}if(preg_match('~^(.+)\\s*(\\(.*\\))?$~U',$Ad,$z)&&(!grant("REVOKE",$He,$z[2]," ON $z[1] FROM $yd")||!grant("GRANT",$pc,$z[2]," ON $z[1] TO $yd"))){$k=true;break;}}}if(!$k&&isset($_GET["host"])){if($Dd!=$yd)queries("DROP USER $Dd");elseif(!isset($_GET["grant"])){foreach($qc
as$Ad=>$He){if(preg_match('~^(.+)(\\(.*\\))?$~U',$Ad,$z))grant("REVOKE",array_keys($He),$z[2]," ON $z[1] FROM $yd");}}}queries_redirect(ME."privileges=",(isset($_GET["host"])?'Uživatel byl změněn.':'Uživatel byl vytvořen.'),!$k);if($fb)$g->query("DROP USER $yd");}}page_header((isset($_GET["host"])?'Uživatel'.": ".h("$ha@$_GET[host]"):'Vytvořit uživatele'),$k,array("privileges"=>array('','Oprávnění')));if($_POST){$H=$_POST;$qc=$xd;}else{$H=$_GET+array("host"=>$g->result("SELECT SUBSTRING_INDEX(CURRENT_USER, '@', -1)"));$H["pass"]=$Cd;if($Cd!="")$H["hashed"]=true;$qc[(DB!=""&&!isset($_GET["host"])?idf_escape(addcslashes(DB,"%_")):"").".*"]=array();}echo'<form action="" method="post">
<table cellspacing="0">
<tr><th>Server<td><input name="host" maxlength="60" value="',h($H["host"]),'">
<tr><th>Uživatel<td><input name="user" maxlength="16" value="',h($H["user"]),'">
<tr><th>Heslo<td><input id="pass" name="pass" value="',h($H["pass"]),'">
';if(!$H["hashed"]){echo'<script type="text/javascript">typePassword(document.getElementById(\'pass\'));</script>';}echo
checkbox("hashed",1,$H["hashed"],'Zahašované',"typePassword(this.form['pass'], this.checked);"),'</table>

';echo"<table cellspacing='0'>\n","<thead><tr><th colspan='2'><a href='http://dev.mysql.com/doc/refman/".substr($g->server_info,0,3)."/en/grant.html#priv_level' target='_blank' rel='noreferrer'>".'Oprávnění'."</a>";$p=0;foreach($qc
as$Ad=>$pc){echo'<th>'.($Ad!="*.*"?"<input name='objects[$p]' value='".h($Ad)."' size='10'>":"<input type='hidden' name='objects[$p]' value='*.*' size='10'>*.*");$p++;}echo"</thead>\n";foreach(array(""=>"","Server Admin"=>'Server',"Databases"=>'Databáze',"Tables"=>'Tabulka',"Columns"=>'Sloupec',"Procedures"=>'Procedura',)as$ab=>$pb){foreach((array)$te[$ab]as$se=>$Ua){echo"<tr".odd()."><td".($pb?">$pb<td":" colspan='2'").' lang="en" title="'.h($Ua).'">'.h($se);$p=0;foreach($qc
as$Ad=>$pc){$_="'grants[$p][".h(strtoupper($se))."]'";$X=$pc[strtoupper($se)];if($ab=="Server Admin"&&$Ad!=(isset($qc["*.*"])?"*.*":".*"))echo"<td>&nbsp;";elseif(isset($_GET["grant"]))echo"<td><select name=$_><option><option value='1'".($X?" selected":"").">".'Povolit'."<option value='0'".($X=="0"?" selected":"").">".'Zakázat'."</select>";else
echo"<td align='center'><input type='checkbox' name=$_ value='1'".($X?" checked":"").($se=="All privileges"?" id='grants-$p-all'":($se=="Grant option"?"":" onclick=\"if (this.checked) formUncheck('grants-$p-all');\"")).">";$p++;}}}echo"</table>\n",'<p>
<input type="submit" value="Uložit">
';if(isset($_GET["host"])){echo'<input type="submit" name="drop" value="Odstranit"',confirm(),'>';}echo'<input type="hidden" name="token" value="',$R,'">
</form>
';}elseif(isset($_GET["processlist"])){if(support("kill")&&$_POST&&!$k){$Oc=0;foreach((array)$_POST["kill"]as$W){if(queries("KILL ".(+$W)))$Oc++;}queries_redirect(ME."processlist=",lang(array('Byl ukončen %d proces.','Byly ukončeny %d procesy.','Bylo ukončeno %d procesů.'),$Oc),$Oc||!$_POST["kill"]);}page_header('Seznam procesů',$k);echo'
<form action="" method="post">
<table cellspacing="0" onclick="tableClick(event);" class="nowrap checkable">
';$p=-1;foreach(process_list()as$p=>$H){if(!$p)echo"<thead><tr lang='en'>".(support("kill")?"<th>&nbsp;":"")."<th>".implode("<th>",array_keys($H))."</thead>\n";echo"<tr".odd().">".(support("kill")?"<td>".checkbox("kill[]",$H["Id"],0):"");foreach($H
as$v=>$W)echo"<td>".(($u=="sql"&&$v=="Info"&&$H["Command"]=="Query"&&$W!="")||($u=="pgsql"&&$v=="current_query"&&$W!="<IDLE>")||($u=="oracle"&&$v=="sql_text"&&$W!="")?"<code class='jush-$u'>".shorten_utf8($W,100,"</code>").' <a href="'.h(ME.($H["db"]!=""?"db=".urlencode($H["db"])."&":"")."sql=".urlencode($W)).'">'.'Upravit'.'</a>':nbsp($W));echo"\n";}echo'</table>
<script type=\'text/javascript\'>tableCheck();</script>
<p>
';if(support("kill")){echo($p+1)."/".sprintf('%d celkem',$g->result("SELECT @@max_connections")),"<p><input type='submit' value='".'Ukončit'."'>\n";}echo'<input type="hidden" name="token" value="',$R,'">
</form>
';}elseif(isset($_GET["select"])){$a=$_GET["select"];$P=table_status($a);$t=indexes($a);$m=fields($a);$hc=column_foreign_keys($a);if($P["Oid"]=="t")$t[]=array("type"=>"PRIMARY","columns"=>array("oid"));parse_str($_COOKIE["adminer_import"],$qa);$Ie=array();$f=array();$zf=null;foreach($m
as$v=>$l){$_=$b->fieldName($l);if(isset($l["privileges"]["select"])&&$_!=""){$f[$v]=html_entity_decode(strip_tags($_));if(ereg('text|lob',$l["type"]))$zf=$b->selectLengthProcess();}$Ie+=$l["privileges"];}list($J,$rc)=$b->selectColumnsProcess($f,$t);$Z=$b->selectSearchProcess($m,$t);$Nd=$b->selectOrderProcess($m,$t);$x=$b->selectLimitProcess();$mc=($J?implode(", ",$J):($P["Oid"]=="t"?"oid, ":"")."*")."\nFROM ".table($a);$sc=($rc&&count($rc)<count($J)?"\nGROUP BY ".implode(", ",$rc):"").($Nd?"\nORDER BY ".implode(", ",$Nd):"");if($_GET["val"]&&is_ajax()){header("Content-Type: text/plain; charset=utf-8");foreach($_GET["val"]as$Sf=>$H)echo$g->result("SELECT".limit(idf_escape(key($H))." FROM ".table($a)," WHERE ".where_check($Sf).($Z?" AND ".implode(" AND ",$Z):"").($Nd?" ORDER BY ".implode(", ",$Nd):""),1));exit;}if($_POST&&!$k){$hg="(".implode(") OR (",array_map('where_check',(array)$_POST["check"])).")";$pe=$Uf=null;foreach($t
as$s){if($s["type"]=="PRIMARY"){$pe=array_flip($s["columns"]);$Uf=($J?$pe:array());break;}}foreach((array)$Uf
as$v=>$W){if(in_array(idf_escape($v),$J))unset($Uf[$v]);}if($_POST["export"]){cookie("adminer_import","output=".urlencode($_POST["output"])."&format=".urlencode($_POST["format"]));dump_headers($a);$b->dumpTable($a,"");if(!is_array($_POST["check"])||$Uf===array()){$gg=$Z;if(is_array($_POST["check"]))$gg[]="($hg)";$E="SELECT $mc".($gg?"\nWHERE ".implode(" AND ",$gg):"").$sc;}else{$Qf=array();foreach($_POST["check"]as$W)$Qf[]="(SELECT".limit($mc,"\nWHERE ".($Z?implode(" AND ",$Z)." AND ":"").where_check($W).$sc,1).")";$E=implode(" UNION ALL ",$Qf);}$b->dumpData($a,"table",$E);exit;}if(!$b->selectEmailProcess($Z,$hc)){if($_POST["save"]||$_POST["delete"]){$F=true;$ra=0;$E=table($a);$L=array();if(!$_POST["delete"]){foreach($f
as$_=>$W){$W=process_input($m[$_]);if($W!==null){if($_POST["clone"])$L[idf_escape($_)]=($W!==false?$W:idf_escape($_));elseif($W!==false)$L[]=idf_escape($_)." = $W";}}$E.=($_POST["clone"]?" (".implode(", ",array_keys($L)).")\nSELECT ".implode(", ",$L)."\nFROM ".table($a):" SET\n".implode(",\n",$L));}if($_POST["delete"]||$L){$Sa="UPDATE";if($_POST["delete"]){$Sa="DELETE";$E="FROM $E";}if($_POST["clone"]){$Sa="INSERT";$E="INTO $E";}if($_POST["all"]||($Uf===array()&&$_POST["check"])||count($rc)<count($J)){$F=queries($Sa." $E".($_POST["all"]?($Z?"\nWHERE ".implode(" AND ",$Z):""):"\nWHERE $hg"));$ra=$g->affected_rows;}else{foreach((array)$_POST["check"]as$W){$F=queries($Sa.limit1($E,"\nWHERE ".where_check($W)));if(!$F)break;$ra+=$g->affected_rows;}}}queries_redirect(remove_from_uri("page"),lang(array('Byl ovlivněn %d záznam.','Byly ovlivněny %d záznamy.','Bylo ovlivněno %d záznamů.'),$ra),$F);}elseif(!$_POST["import"]){if(!$_POST["val"])$k='Dvojklikněte na políčko, které chcete změnit.';else{$F=true;$ra=0;foreach($_POST["val"]as$Sf=>$H){$L=array();foreach($H
as$v=>$W){$v=bracket_escape($v,1);$L[]=idf_escape($v)." = ".(ereg('char|text',$m[$v]["type"])||$W!=""?$b->processInput($m[$v],$W):"NULL");}$E=table($a)." SET ".implode(", ",$L);$gg=" WHERE ".where_check($Sf).($Z?" AND ".implode(" AND ",$Z):"");$F=queries("UPDATE".(count($rc)<count($J)?" $E$gg":limit1($E,$gg)));if(!$F)break;$ra+=$g->affected_rows;}queries_redirect(remove_from_uri(),lang(array('Byl ovlivněn %d záznam.','Byly ovlivněny %d záznamy.','Bylo ovlivněno %d záznamů.'),$ra),$F);}}elseif(is_string($ac=get_file("csv_file",true))){cookie("adminer_import","output=".urlencode($qa["output"])."&format=".urlencode($_POST["separator"]));$F=true;$Ra=array_keys($m);preg_match_all('~(?>"[^"]*"|[^"\\r\\n]+)+~',$ac,$ed);$ra=count($ed[0]);begin();$Ve=($_POST["separator"]=="csv"?",":($_POST["separator"]=="tsv"?"\t":";"));foreach($ed[0]as$v=>$W){preg_match_all("~((\"[^\"]*\")+|[^$Ve]*)$Ve~",$W.$Ve,$fd);if(!$v&&!array_diff($fd[1],$Ra)){$Ra=$fd[1];$ra--;}else{$L=array();foreach($fd[1]as$p=>$Oa)$L[idf_escape($Ra[$p])]=($Oa==""&&$m[$Ra[$p]]["null"]?"NULL":q(str_replace('""','"',preg_replace('~^"|"$~','',$Oa))));$F=insert_update($a,$L,$pe);if(!$F)break;}}if($F)queries("COMMIT");queries_redirect(remove_from_uri("page"),lang(array('Byl importován %d záznam.','Byly importovány %d záznamy.','Bylo importováno %d záznamů.'),$ra),$F);queries("ROLLBACK");}else$k=upload_error($ac);}}$pf=$b->tableName($P);page_header('Vypsat'.": $pf",$k);session_write_close();$L=null;if(isset($Ie["insert"])){$L="";foreach((array)$_GET["where"]as$W){if(count($hc[$W["col"]])==1&&($W["op"]=="="||(!$W["op"]&&!ereg('[_%]',$W["val"]))))$L.="&set".urlencode("[".bracket_escape($W["col"])."]")."=".urlencode($W["val"]);}}$b->selectLinks($P,$L);if(!$f)echo"<p class='error'>".'Nepodařilo se vypsat tabulku'.($m?".":": ".error())."\n";else{echo"<form action='' id='form'>\n","<div style='display: none;'>";hidden_fields_get();echo(DB!=""?'<input type="hidden" name="db" value="'.h(DB).'">'.(isset($_GET["ns"])?'<input type="hidden" name="ns" value="'.h($_GET["ns"]).'">':""):"");echo'<input type="hidden" name="select" value="'.h($a).'">',"</div>\n";$b->selectColumnsPrint($J,$f);$b->selectSearchPrint($Z,$f,$t);$b->selectOrderPrint($Nd,$f,$t);$b->selectLimitPrint($x);$b->selectLengthPrint($zf);$b->selectActionPrint($t);echo"</form>\n";$B=$_GET["page"];if($B=="last"){$kc=$g->result("SELECT COUNT(*) FROM ".table($a).($Z?" WHERE ".implode(" AND ",$Z):""));$B=floor(max(0,$kc-1)/$x);}$E="SELECT".limit((+$x&&$rc&&count($rc)<count($J)&&$u=="sql"?"SQL_CALC_FOUND_ROWS ":"").$mc,($Z?"\nWHERE ".implode(" AND ",$Z):"").$sc,($x!=""?+$x:null),($B?$x*$B:0),"\n");echo$b->selectQuery($E);$F=$g->query($E);if(!$F)echo"<p class='error'>".error()."\n";else{if($u=="mssql")$F->seek($x*$B);$Db=array();echo"<form action='' method='post' enctype='multipart/form-data'>\n";$I=array();while($H=$F->fetch_assoc()){if($B&&$u=="oracle")unset($H["RNUM"]);$I[]=$H;}if($_GET["page"]!="last")$kc=(+$x&&$rc&&count($rc)<count($J)?($u=="sql"?$g->result(" SELECT FOUND_ROWS()"):$g->result("SELECT COUNT(*) FROM ($E) x")):count($I));if(!$I)echo"<p class='message'>".'Žádné řádky.'."\n";else{$Ca=$b->backwardKeys($a,$pf);echo"<table cellspacing='0' class='nowrap checkable' onclick='tableClick(event);' onkeydown='return editingKeydown(event);'>\n","<thead><tr>".(!$rc&&$J?"":"<td><input type='checkbox' id='all-page' onclick='formCheck(this, /check/);'> <a href='".h($_GET["modify"]?remove_from_uri("modify"):$_SERVER["REQUEST_URI"]."&modify=1")."'>".'upravit'."</a>");$wd=array();$oc=array();reset($J);$ye=1;foreach($I[0]as$v=>$W){if($P["Oid"]!="t"||$v!="oid"){$W=$_GET["columns"][key($J)];$l=$m[$J?($W?$W["col"]:current($J)):$v];$_=($l?$b->fieldName($l,$ye):"*");if($_!=""){$ye++;$wd[$v]=$_;$e=idf_escape($v);$yc=remove_from_uri('(order|desc)[^=]*|page').'&order%5B0%5D='.urlencode($v);echo'<th><a href="'.h($yc).'">'.(!$J||$W?apply_sql_function($W["fun"],$_):h(current($J)))."</a>";echo"<a href='".h("$yc&desc%5B0%5D=1")."' title='".'sestupně'."' class='text'> ↓</a>";}$oc[$v]=$W["fun"];next($J);}}$Xc=array();if($_GET["modify"]){foreach($I
as$H){foreach($H
as$v=>$W)$Xc[$v]=max($Xc[$v],min(40,strlen(utf8_decode($W))));}}echo($Ca?"<th>".'Vztahy':"")."</thead>\n";foreach($b->rowDescriptions($I,$hc)as$vd=>$H){$Rf=unique_array($I[$vd],$t);$Sf="";foreach($Rf
as$v=>$W)$Sf.="&".($W!==null?urlencode("where[".bracket_escape($v)."]")."=".urlencode($W):"null%5B%5D=".urlencode($v));echo"<tr".odd().">".(!$rc&&$J?"":"<td>".checkbox("check[]",substr($Sf,1),in_array(substr($Sf,1),(array)$_POST["check"]),"","this.form['all'].checked = false; formUncheck('all-page');").(count($rc)<count($J)||information_schema(DB)?"":" <a href='".h(ME."edit=".urlencode($a).$Sf)."'>".'upravit'."</a>"));foreach($H
as$v=>$W){if(isset($wd[$v])){$l=$m[$v];if($W!=""&&(!isset($Db[$v])||$Db[$v]!=""))$Db[$v]=(is_mail($W)?$wd[$v]:"");$y="";$W=$b->editVal($W,$l);if($W!==null){if(ereg('blob|bytea|raw|file',$l["type"])&&$W!="")$y=h(ME.'download='.urlencode($a).'&field='.urlencode($v).$Sf);if($W==="")$W="&nbsp;";elseif(is_utf8($W)){if($zf!=""&&ereg('text|blob',$l["type"]))$W=shorten_utf8($W,max(0,+$zf));else$W=h($W);}if(!$y){foreach((array)$hc[$v]as$n){if(count($hc[$v])==1||end($n["source"])==$v){$y="";foreach($n["source"]as$p=>$af)$y.=where_link($p,$n["target"][$p],$I[$vd][$af]);$y=h(($n["db"]!=""?preg_replace('~([?&]db=)[^&]+~','\\1'.urlencode($n["db"]),ME):ME).'select='.urlencode($n["table"]).$y);if(count($n["source"])==1)break;}}}if($v=="COUNT(*)"){$y=h(ME."select=".urlencode($a));$p=0;foreach((array)$_GET["where"]as$V){if(!array_key_exists($V["col"],$Rf))$y.=h(where_link($p++,$V["col"],$V["val"],$V["op"]));}foreach($Rf
as$Nc=>$V)$y.=h(where_link($p++,$Nc,$V));}}if(!$y){if(is_mail($W))$y="mailto:$W";if($we=is_url($H[$v]))$y=($we=="http"&&$ba?$H[$v]:"$we://www.adminer.org/redirect/?url=".urlencode($H[$v]));}$q=h("val[$Sf][".bracket_escape($v)."]");$X=$_POST["val"][$Sf][bracket_escape($v)];$uc=h($X!==null?$X:$H[$v]);$cd=strpos($W,"<i>...</i>");$Ab=is_utf8($W)&&$I[$vd][$v]==$H[$v]&&!$oc[$v];$yf=ereg('text|lob',$l["type"]);echo(($_GET["modify"]&&$Ab)||$X!==null?"<td>".($yf?"<textarea name='$q' cols='30' rows='".(substr_count($H[$v],"\n")+1)."'>$uc</textarea>":"<input name='$q' value='$uc' size='$Xc[$v]'>"):"<td id='$q' ondblclick=\"".($Ab?"selectDblClick(this, event".($cd?", 2":($yf?", 1":"")).")":"alert('".h('Ke změně této hodnoty použijte odkaz upravit.')."')").";\">".$b->selectVal($W,$y,$l));}}if($Ca)echo"<td>";$b->backwardKeysPrint($Ca,$I[$vd]);echo"</tr>\n";}echo"</table>\n",(!$rc&&$J?"":"<script type='text/javascript'>tableCheck();</script>\n");}if($I||$B){$Ob=true;if($_GET["page"]!="last"&&+$x&&count($rc)>=count($J)&&($kc>=$x||$B)){$kc=found_rows($P,$Z);if($kc<max(1e4,2*($B+1)*$x)){ob_flush();flush();$kc=$g->result("SELECT COUNT(*) FROM ".table($a).($Z?" WHERE ".implode(" AND ",$Z):""));}else$Ob=false;}echo"<p class='pages'>";if(+$x&&$kc>$x){$hd=floor(($kc-1)/$x);echo'<a href="'.h(remove_from_uri("page"))."\" onclick=\"pageClick(this.href, +prompt('".'Stránka'."', '".($B+1)."'), event); return false;\">".'Stránka'."</a>:",pagination(0,$B).($B>5?" ...":"");for($p=max(1,$B-4);$p<min($hd,$B+5);$p++)echo
pagination($p,$B);echo($B+5<$hd?" ...":"").($Ob?pagination($hd,$B):' <a href="'.h(remove_from_uri()."&page=last").'">'.'poslední'."</a>");}echo" (".($Ob?"":"~ ").lang(array('%d řádek','%d řádky','%d řádků'),$kc).") ".checkbox("all",1,0,'celý výsledek')."\n";if($b->selectCommandPrint()){echo'<fieldset><legend>Upravit</legend><div>
<input type="submit" value="Uložit"',($_GET["modify"]?'':' title="'.'Dvojklikněte na políčko, které chcete změnit.'.'" class="jsonly"');?>>
<input type="submit" name="edit" value="Upravit">
<input type="submit" name="clone" value="Klonovat">
<input type="submit" name="delete" value="Smazat" onclick="return confirm('Opravdu? (' + (this.form['all'].checked ? <?php echo$kc,' : formChecked(this, /check/)) + \')\');">
</div></fieldset>
';}$ic=$b->dumpFormat();if($ic){print_fieldset("export",'Export');$Wd=$b->dumpOutput();echo($Wd?html_select("output",$Wd,$qa["output"])." ":""),html_select("format",$ic,$qa["format"])," <input type='submit' name='export' value='".'Export'."'>\n","</div></fieldset>\n";}}if($b->selectImportPrint()){print_fieldset("import",'Import',!$I);echo"<input type='file' name='csv_file'> ",html_select("separator",array("csv"=>"CSV,","csv;"=>"CSV;","tsv"=>"TSV"),$qa["format"],1);echo" <input type='submit' name='import' value='".'Import'."'>","<input type='hidden' name='token' value='$R'>\n","</div></fieldset>\n";}$b->selectEmailPrint(array_filter($Db,'strlen'),$f);echo"</form>\n";}}}elseif(isset($_GET["variables"])){$ef=isset($_GET["status"]);page_header($ef?'Stav':'Proměnné');$bg=($ef?show_status():show_variables());if(!$bg)echo"<p class='message'>".'Žádné řádky.'."\n";else{echo"<table cellspacing='0'>\n";foreach($bg
as$v=>$W){echo"<tr>","<th><code class='jush-".$u.($ef?"status":"set")."'>".h($v)."</code>","<td>".nbsp($W);}echo"</table>\n";}}elseif(isset($_GET["script"])){header("Content-Type: text/javascript; charset=utf-8");if($_GET["script"]=="db"){$mf=array("Data_length"=>0,"Index_length"=>0,"Data_free"=>0);foreach(table_status()as$P){$q=js_escape($P["Name"]);json_row("Comment-$q",nbsp($P["Comment"]));if(!is_view($P)){foreach(array("Engine","Collation")as$v)json_row("$v-$q",nbsp($P[$v]));foreach($mf+array("Auto_increment"=>0,"Rows"=>0)as$v=>$W){if($P[$v]!=""){$W=number_format($P[$v],0,'.',' ');json_row("$v-$q",($v=="Rows"&&$W&&($P["Engine"]=="InnoDB"||$P["Engine"]=="table")?"~ $W":$W));if(isset($mf[$v]))$mf[$v]+=($P["Engine"]!="InnoDB"||$v!="Data_free"?$P[$v]:0);}elseif(array_key_exists($v,$P))json_row("$v-$q");}}}foreach($mf
as$v=>$W)json_row("sum-$v",number_format($W,0,'.',' '));json_row("");}else{foreach(count_tables($b->databases())as$j=>$W)json_row("tables-".js_escape($j),$W);json_row("");}exit;}else{$vf=array_merge((array)$_POST["tables"],(array)$_POST["views"]);if($vf&&!$k&&!$_POST["search"]){$F=true;$ld="";if($u=="sql"&&count($_POST["tables"])>1&&($_POST["drop"]||$_POST["truncate"]||$_POST["copy"]))queries("SET foreign_key_checks = 0");if($_POST["truncate"]){if($_POST["tables"])$F=truncate_tables($_POST["tables"]);$ld='Tabulky byly vyprázdněny.';}elseif($_POST["move"]){$F=move_tables((array)$_POST["tables"],(array)$_POST["views"],$_POST["target"]);$ld='Tabulky byly přesunuty.';}elseif($_POST["copy"]){$F=copy_tables((array)$_POST["tables"],(array)$_POST["views"],$_POST["target"]);$ld='Tabulky byly zkopírovány.';}elseif($_POST["drop"]){if($_POST["views"])$F=drop_views($_POST["views"]);if($F&&$_POST["tables"])$F=drop_tables($_POST["tables"]);$ld='Tabulky byly odstraněny.';}elseif($u!="sql"){$F=($u=="sqlite"?queries("VACUUM"):apply_queries("VACUUM".($_POST["optimize"]?"":" ANALYZE"),$_POST["tables"]));$ld='Tabulky byly optimalizovány.';}elseif($_POST["tables"]&&($F=queries(($_POST["optimize"]?"OPTIMIZE":($_POST["check"]?"CHECK":($_POST["repair"]?"REPAIR":"ANALYZE")))." TABLE ".implode(", ",array_map('idf_escape',$_POST["tables"]))))){while($H=$F->fetch_assoc())$ld.="<b>".h($H["Table"])."</b>: ".h($H["Msg_text"])."<br>";}queries_redirect(substr(ME,0,-1),$ld,$F);}page_header(($_GET["ns"]==""?'Databáze'.": ".h(DB):'Schéma'.": ".h($_GET["ns"])),$k,true);if($b->homepage()){if($_GET["ns"]!==""){echo"<h3>".'Tabulky a pohledy'."</h3>\n";$uf=tables_list();if(!$uf)echo"<p class='message'>".'Žádné tabulky.'."\n";else{echo"<form action='' method='post'>\n","<p>".'Vyhledat data v tabulkách'.": <input name='query' value='".h($_POST["query"])."'> <input type='submit' name='search' value='".'Vyhledat'."'>\n";if($_POST["search"]&&$_POST["query"]!="")search_tables();echo"<table cellspacing='0' class='nowrap checkable' onclick='tableClick(event);'>\n",'<thead><tr class="wrap"><td><input id="check-all" type="checkbox" onclick="formCheck(this, /^(tables|views)\[/);">','<th>'.'Tabulka','<td>'.'Úložiště','<td>'.'Porovnávání','<td>'.'Velikost dat','<td>'.'Velikost indexů','<td>'.'Volné místo','<td>'.'Auto Increment','<td>'.'Řádků',(support("comment")?'<td>'.'Komentář':''),"</thead>\n";foreach($uf
as$_=>$S){$dg=($S!==null&&!eregi("table",$S));echo'<tr'.odd().'><td>'.checkbox(($dg?"views[]":"tables[]"),$_,in_array($_,$vf,true),"","formUncheck('check-all');"),'<th><a href="'.h(ME).'table='.urlencode($_).'" title="'.'Zobrazit strukturu'.'">'.h($_).'</a>';if($dg){echo'<td colspan="6"><a href="'.h(ME)."view=".urlencode($_).'" title="'.'Pozměnit pohled'.'">'.'Pohled'.'</a>','<td align="right"><a href="'.h(ME)."select=".urlencode($_).'" title="'.'Vypsat data'.'">?</a>';}else{foreach(array("Engine"=>array(),"Collation"=>array(),"Data_length"=>array("create",'Pozměnit tabulku'),"Index_length"=>array("indexes",'Pozměnit indexy'),"Data_free"=>array("edit",'Nová položka'),"Auto_increment"=>array("auto_increment=1&create",'Pozměnit tabulku'),"Rows"=>array("select",'Vypsat data'),)as$v=>$y)echo($y?"<td align='right'><a href='".h(ME."$y[0]=").urlencode($_)."' id='$v-".h($_)."' title='$y[1]'>?</a>":"<td id='$v-".h($_)."'>&nbsp;");}echo(support("comment")?"<td id='Comment-".h($_)."'>&nbsp;":"");}echo"<tr><td>&nbsp;<th>".sprintf('%d celkem',count($uf)),"<td>".nbsp($u=="sql"?$g->result("SELECT @@storage_engine"):""),"<td>".nbsp(db_collation(DB,collations()));foreach(array("Data_length","Index_length","Data_free")as$v)echo"<td align='right' id='sum-$v'>&nbsp;";echo"</table>\n","<script type='text/javascript'>tableCheck();</script>\n";if(!information_schema(DB)){echo"<p>".(ereg('^(sql|sqlite|pgsql)$',$u)?($u!="sqlite"?"<input type='submit' value='".'Analyzovat'."'> ":"")."<input type='submit' name='optimize' value='".'Optimalizovat'."'> ":"").($u=="sql"?"<input type='submit' name='check' value='".'Zkontrolovat'."'> <input type='submit' name='repair' value='".'Opravit'."'> ":"")."<input type='submit' name='truncate' value='".'Vyprázdnit'."'".confirm("formChecked(this, /tables/)")."> <input type='submit' name='drop' value='".'Odstranit'."'".confirm("formChecked(this, /tables|views/)").">\n";$i=(support("scheme")?schemas():$b->databases());if(count($i)!=1&&$u!="sqlite"){$j=(isset($_POST["target"])?$_POST["target"]:(support("scheme")?$_GET["ns"]:DB));echo"<p>".'Přesunout do jiné databáze'.": ",($i?html_select("target",$i,$j):'<input name="target" value="'.h($j).'">')," <input type='submit' name='move' value='".'Přesunout'."'>",(support("copy")?" <input type='submit' name='copy' value='".'Zkopírovat'."'>":""),"\n";}echo"<input type='hidden' name='token' value='$R'>\n";}echo"</form>\n";}echo'<p><a href="'.h(ME).'create=">'.'Vytvořit tabulku'."</a>\n";if(support("view"))echo'<a href="'.h(ME).'view=">'.'Vytvořit pohled'."</a>\n";if(support("routine")){echo"<h3>".'Procedury a funkce'."</h3>\n";$Me=routines();if($Me){echo"<table cellspacing='0'>\n",'<thead><tr><th>'.'Název'.'<td>'.'Typ'.'<td>'.'Návratový typ'."<td>&nbsp;</thead>\n";odd('');foreach($Me
as$H){echo'<tr'.odd().'>','<th><a href="'.h(ME).($H["ROUTINE_TYPE"]!="PROCEDURE"?'callf=':'call=').urlencode($H["ROUTINE_NAME"]).'">'.h($H["ROUTINE_NAME"]).'</a>','<td>'.h($H["ROUTINE_TYPE"]),'<td>'.h($H["DTD_IDENTIFIER"]),'<td><a href="'.h(ME).($H["ROUTINE_TYPE"]!="PROCEDURE"?'function=':'procedure=').urlencode($H["ROUTINE_NAME"]).'">'.'Změnit'."</a>";}echo"</table>\n";}echo'<p>'.(support("procedure")?'<a href="'.h(ME).'procedure=">'.'Vytvořit proceduru'.'</a> ':'').'<a href="'.h(ME).'function=">'.'Vytvořit funkci'."</a>\n";}if(support("sequence")){echo"<h3>".'Sekvence'."</h3>\n";$We=get_vals("SELECT sequence_name FROM information_schema.sequences WHERE sequence_schema = current_schema()");if($We){echo"<table cellspacing='0'>\n","<thead><tr><th>".'Název'."</thead>\n";odd('');foreach($We
as$W)echo"<tr".odd()."><th><a href='".h(ME)."sequence=".urlencode($W)."'>".h($W)."</a>\n";echo"</table>\n";}echo"<p><a href='".h(ME)."sequence='>".'Vytvořit sekvenci'."</a>\n";}if(support("type")){echo"<h3>".'Uživatelské typy'."</h3>\n";$T=types();if($T){echo"<table cellspacing='0'>\n","<thead><tr><th>".'Název'."</thead>\n";odd('');foreach($T
as$W)echo"<tr".odd()."><th><a href='".h(ME)."type=".urlencode($W)."'>".h($W)."</a>\n";echo"</table>\n";}echo"<p><a href='".h(ME)."type='>".'Vytvořit typ'."</a>\n";}if(support("event")){echo"<h3>".'Události'."</h3>\n";$I=get_rows("SHOW EVENTS");if($I){echo"<table cellspacing='0'>\n","<thead><tr><th>".'Název'."<td>".'Plán'."<td>".'Začátek'."<td>".'Konec'."</thead>\n";foreach($I
as$H){echo"<tr>",'<th><a href="'.h(ME).'event='.urlencode($H["Name"]).'">'.h($H["Name"])."</a>","<td>".($H["Execute at"]?'V daný čas'."<td>".$H["Execute at"]:'Každých'." ".$H["Interval value"]." ".$H["Interval field"]."<td>$H[Starts]"),"<td>$H[Ends]";}echo"</table>\n";$Nb=$g->result("SELECT @@event_scheduler");if($Nb&&$Nb!="ON")echo"<p class='error'><code class='jush-sqlset'>event_scheduler</code>: ".h($Nb)."\n";}echo'<p><a href="'.h(ME).'event=">'.'Vytvořit událost'."</a>\n";}if($uf)echo"<script type='text/javascript'>ajaxSetHtml('".js_escape(ME)."script=db');</script>\n";}}}page_footer();