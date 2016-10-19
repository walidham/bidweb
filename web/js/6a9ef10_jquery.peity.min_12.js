// Peity jQuery plugin version 3.1.1
// (c) 2015 Ben Pickles
//
// http://benpickles.github.io/peity
//
// Released under MIT license.
(function(k,x,h,v){var p=function(a,b){return k(x.createElementNS("http://www.w3.org/2000/svg",a)).attr(b)},z="createElementNS"in x&&p("svg",{})[0].createSVGRect,d=k.fn.peity=function(a,b){z&&this.each(function(){var e=k(this),c=e.data("_peity");c?(a&&(c.type=a),k.extend(c.opts,b)):(c=new y(e,a,k.extend({},d.defaults[a],e.data("peity"),b)),e.change(function(){c.draw()}).data("_peity",c));c.draw()});return this},y=function(a,b,e){this.$el=a;this.type=b;this.opts=e},w=y.prototype;w.draw=function(){d.graphers[this.type].call(this,
this.opts)};w.fill=function(){var a=this.opts.fill;return k.isFunction(a)?a:function(b,e){return a[e%a.length]}};w.prepare=function(a,b){this.$svg||this.$el.hide().after(this.$svg=p("svg",{"class":"peity"}));return this.$svg.empty().data("peity",this).attr({height:b,width:a})};w.values=function(){return k.map(this.$el.text().split(this.opts.delimiter),function(a){return parseFloat(a)})};d.defaults={};d.graphers={};d.register=function(a,b,e){this.defaults[a]=b;this.graphers[a]=e};d.register("pie",
{fill:["#ff9900","#fff4dd","#ffc66e"],radius:8},function(a){if(!a.delimiter){var b=this.$el.text().match(/[^0-9\.]/);a.delimiter=b?b[0]:","}b=k.map(this.values(),function(a){return 0<a?a:0});if("/"==a.delimiter)var e=b[0],b=[e,h.max(0,b[1]-e)];for(var c=0,e=b.length,s=0;c<e;c++)s+=b[c];s||(e=2,s=1,b=[0,1]);var l=2*a.radius,l=this.prepare(a.width||l,a.height||l),c=l.width(),f=l.height(),j=c/2,d=f/2,f=h.min(j,d),a=a.innerRadius;"donut"==this.type&&!a&&(a=0.5*f);for(var q=h.PI,r=this.fill(),g=this.scale=
function(a,b){var c=a/s*q*2-q/2;return[b*h.cos(c)+j,b*h.sin(c)+d]},m=0,c=0;c<e;c++){var t=b[c],i=t/s;if(0!=i){if(1==i)if(a)var i=j-0.01,o=d-f,n=d-a,i=p("path",{d:["M",j,o,"A",f,f,0,1,1,i,o,"L",i,n,"A",a,a,0,1,0,j,n].join(" ")});else i=p("circle",{cx:j,cy:d,r:f});else o=m+t,n=["M"].concat(g(m,f),"A",f,f,0,0.5<i?1:0,1,g(o,f),"L"),a?n=n.concat(g(o,a),"A",a,a,0,0.5<i?1:0,0,g(m,a)):n.push(j,d),m+=t,i=p("path",{d:n.join(" ")});i.attr("fill",r.call(this,t,c,b));l.append(i)}}});d.register("donut",k.extend(!0,
{},d.defaults.pie),function(a){d.graphers.pie.call(this,a)});d.register("line",{delimiter:",",fill:"#c6d9fd",height:16,min:0,stroke:"#4d89f9",strokeWidth:1,width:32},function(a){var b=this.values();1==b.length&&b.push(b[0]);for(var e=h.max.apply(h,a.max==v?b:b.concat(a.max)),c=h.min.apply(h,a.min==v?b:b.concat(a.min)),d=this.prepare(a.width,a.height),l=a.strokeWidth,f=d.width(),j=d.height()-l,k=e-c,e=this.x=function(a){return a*(f/(b.length-1))},q=this.y=function(a){var b=j;k&&(b-=(a-c)/k*j);return b+
l/2},r=q(h.max(c,0)),g=[0,r],m=0;m<b.length;m++)g.push(e(m),q(b[m]));g.push(f,r);d.append(p("polygon",{fill:a.fill,points:g.join(" ")}));l&&d.append(p("polyline",{fill:"transparent",points:g.slice(2,g.length-2).join(" "),stroke:a.stroke,"stroke-width":l,"stroke-linecap":"square"}))});d.register("bar",{delimiter:",",fill:["#4D89F9"],height:16,min:0,padding:0.1,width:32},function(a){for(var b=this.values(),e=h.max.apply(h,a.max==v?b:b.concat(a.max)),c=h.min.apply(h,a.min==v?b:b.concat(a.min)),d=this.prepare(a.width,
a.height),l=d.width(),f=d.height(),j=e-c,a=a.padding,k=this.fill(),q=this.x=function(a){return a*l/b.length},r=this.y=function(a){return f-(j?(a-c)/j*f:1)},g=0;g<b.length;g++){var m=q(g+a),t=q(g+1-a)-m,i=b[g],o=r(i),n=o,u;j?0>i?n=r(h.min(e,0)):o=r(h.max(c,0)):u=1;u=o-n;0==u&&(u=1,0<e&&j&&n--);d.append(p("rect",{fill:k.call(this,i,g,b),x:m,y:n,width:t,height:u}))}})})(jQuery,document,Math);
