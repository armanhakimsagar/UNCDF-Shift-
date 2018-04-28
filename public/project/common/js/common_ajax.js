/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
function commonAjaxRequest(ajaxObj){
    $.ajax({
        type        :   ajaxObj.type,
        url         :   ajaxObj.url,
        dataType    :   ajaxObj.dataType,
        data        :   ajaxObj.data,
        success     :   function(response){
            return response;
        }
    });
}