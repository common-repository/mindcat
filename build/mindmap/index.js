(()=>{"use strict";var e={n:t=>{var n=t&&t.__esModule?()=>t.default:()=>t;return e.d(n,{a:n}),n},d:(t,n)=>{for(var a in n)e.o(n,a)&&!e.o(t,a)&&Object.defineProperty(t,a,{enumerable:!0,get:n[a]})},o:(e,t)=>Object.prototype.hasOwnProperty.call(e,t)};const t=window.wp.blocks,n=window.wp.i18n,a=window.React,l=window.wp.blockEditor,o=window.wp.element,r=window.wp.components,i=window.wp.serverSideRender;var c=e.n(i);(0,t.registerBlockType)("mindcat/mindmap",{edit:function({className:e,attributes:t,setAttributes:i,isSelected:d,id:m}){const s=(0,l.useBlockProps)(),{size:u,cat:w,count:p,hide_empty:_,max_level:b}=t;return(0,a.createElement)("div",{className:e,...s},(0,a.createElement)(o.Fragment,null,d&&(0,a.createElement)(l.InspectorControls,null,(0,a.createElement)(r.PanelBody,{title:(0,n.__)("Display","mindcat")},(0,a.createElement)(r.TextControl,{label:(0,n.__)("Size","mindcat"),value:u,onChange:e=>i({size:e})}),(0,a.createElement)(r.TextControl,{label:(0,n.__)("Cat","mindcat"),value:w,onChange:e=>i({cat:e})}),(0,a.createElement)(r.TextControl,{label:(0,n.__)("Count","mindcat"),value:p,onChange:e=>i({count:e})}),(0,a.createElement)(r.ToggleControl,{label:(0,n.__)("Hide empty","mindcat"),value:_,onChange:e=>i({hide_empty:e})}),(0,a.createElement)(r.TextControl,{label:(0,n.__)("Max level","mindcat"),value:b,onChange:e=>i({max_level:e})}))),(0,a.createElement)(c(),{block:"mindcat/mindmap",attributes:t})))},save:function({attributes:e}){return null}})})();