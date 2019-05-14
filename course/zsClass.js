if (typeof dwr == 'undefined' || dwr.engine == undefined) throw new Error('You must include DWR engine before including this file');

(function() {
if (dwr.engine._getObject("zsClass") == undefined) {
var p;

p = {};
p._path = '/js/ajax';







p.ZsAjax = function(p0, p1, p2, callback) {
return dwr.engine._execute(p._path, 'zsClass', 'ZsAjax', arguments);
};







p.commonAjax = function(p0, p1, p2, callback) {
return dwr.engine._execute(p._path, 'zsClass', 'commonAjax', arguments);
};







p.coreAjax = function(p0, p1, p2, callback) {
return dwr.engine._execute(p._path, 'zsClass', 'coreAjax', arguments);
};







p.dotAjax = function(p0, p1, p2, callback) {
return dwr.engine._execute(p._path, 'zsClass', 'dotAjax', arguments);
};

dwr.engine._setObject("zsClass", p);
}
})();

