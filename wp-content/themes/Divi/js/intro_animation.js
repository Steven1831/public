var ut = Object.defineProperty;
var ft = (e, t, n) =>
  t in e
    ? ut(e, t, { enumerable: !0, configurable: !0, writable: !0, value: n })
    : (e[t] = n);
var $ = (e, t, n) => (ft(e, typeof t != "symbol" ? t + "" : t, n), n);
(function () {
  const t = document.createElement("link").relList;
  if (t && t.supports && t.supports("modulepreload")) return;
  for (const s of document.querySelectorAll('link[rel="modulepreload"]')) i(s);
  new MutationObserver((s) => {
    for (const o of s)
      if (o.type === "childList")
        for (const r of o.addedNodes)
          r.tagName === "LINK" && r.rel === "modulepreload" && i(r);
  }).observe(document, { childList: !0, subtree: !0 });
  function n(s) {
    const o = {};
    return (
      s.integrity && (o.integrity = s.integrity),
      s.referrerPolicy && (o.referrerPolicy = s.referrerPolicy),
      s.crossOrigin === "use-credentials"
        ? (o.credentials = "include")
        : s.crossOrigin === "anonymous"
        ? (o.credentials = "omit")
        : (o.credentials = "same-origin"),
      o
    );
  }
  function i(s) {
    if (s.ep) return;
    s.ep = !0;
    const o = n(s);
    fetch(s.href, o);
  }
})();
function k() {}
const tt = (e) => e;
function et(e) {
  return e();
}
function U() {
  return Object.create(null);
}
function O(e) {
  e.forEach(et);
}
function I(e) {
  return typeof e == "function";
}
function lt(e, t) {
  return e != e
    ? t == t
    : e !== t || (e && typeof e == "object") || typeof e == "function";
}
let L;
function G(e, t) {
  return e === t
    ? !0
    : (L || (L = document.createElement("a")), (L.href = t), e === L.href);
}
function at(e) {
  return Object.keys(e).length === 0;
}
const nt = typeof window < "u";
let $t = nt ? () => window.performance.now() : () => Date.now(),
  F = nt ? (e) => requestAnimationFrame(e) : k;
const x = new Set();
function it(e) {
  x.forEach((t) => {
    t.c(e) || (x.delete(t), t.f());
  }),
    x.size !== 0 && F(it);
}
function dt(e) {
  let t;
  return (
    x.size === 0 && F(it),
    {
      promise: new Promise((n) => {
        x.add((t = { c: e, f: n }));
      }),
      abort() {
        x.delete(t);
      },
    }
  );
}
function st(e, t) {
  e.appendChild(t);
}
function ht(e, t, n) {
  const i = H(e);
  if (!i.getElementById(t)) {
    const s = A("style");
    (s.id = t), (s.textContent = n), rt(i, s);
  }
}
function H(e) {
  if (!e) return document;
  const t = e.getRootNode ? e.getRootNode() : e.ownerDocument;
  return t && t.host ? t : e.ownerDocument;
}
function _t(e) {
  const t = A("style");
  return (t.textContent = "/* empty */"), rt(H(e), t), t.sheet;
}
function rt(e, t) {
  return st(e.head || e, t), t.sheet;
}
function J(e, t, n) {
  e.insertBefore(t, n || null);
}
function P(e) {
  e.parentNode && e.parentNode.removeChild(e);
}
function A(e) {
  return document.createElement(e);
}
function mt(e) {
  return document.createTextNode(e);
}
function pt() {
  return mt("");
}
function N(e, t, n) {
  n == null
    ? e.removeAttribute(t)
    : e.getAttribute(t) !== n && e.setAttribute(t, n);
}
function gt(e) {
  return Array.from(e.childNodes);
}
function yt(e, t, { bubbles: n = !1, cancelable: i = !1 } = {}) {
  return new CustomEvent(e, { detail: t, bubbles: n, cancelable: i });
}
function bt(e) {
  const t = {};
  return (
    e.childNodes.forEach((n) => {
      t[n.slot || "default"] = !0;
    }),
    t
  );
}
const R = new Map();
let T = 0;
function wt(e) {
  let t = 5381,
    n = e.length;
  for (; n--; ) t = ((t << 5) - t) ^ e.charCodeAt(n);
  return t >>> 0;
}
function xt(e, t) {
  const n = { stylesheet: _t(t), rules: {} };
  return R.set(e, n), n;
}
function Et(e, t, n, i, s, o, r, c = 0) {
  const f = 16.666 / i;
  let u = `{
`;
  for (let g = 0; g <= 1; g += f) {
    const y = t + (n - t) * o(g);
    u +=
      g * 100 +
      `%{${r(y, 1 - y)}}
`;
  }
  const a =
      u +
      `100% {${r(n, 1 - n)}}
}`,
    l = `__svelte_${wt(a)}_${c}`,
    d = H(e),
    { stylesheet: h, rules: _ } = R.get(d) || xt(d, e);
  _[l] ||
    ((_[l] = !0), h.insertRule(`@keyframes ${l} ${a}`, h.cssRules.length));
  const p = e.style.animation || "";
  return (
    (e.style.animation = `${
      p ? `${p}, ` : ""
    }${l} ${i}ms linear ${s}ms 1 both`),
    (T += 1),
    l
  );
}
function Ot(e, t) {
  const n = (e.style.animation || "").split(", "),
    i = n.filter(
      t ? (o) => o.indexOf(t) < 0 : (o) => o.indexOf("__svelte") === -1
    ),
    s = n.length - i.length;
  s && ((e.style.animation = i.join(", ")), (T -= s), T || vt());
}
function vt() {
  F(() => {
    T ||
      (R.forEach((e) => {
        const { ownerNode: t } = e.stylesheet;
        t && P(t);
      }),
      R.clear());
  });
}
let C;
function j(e) {
  C = e;
}
function Nt() {
  if (!C) throw new Error("Function called outside component initialization");
  return C;
}
function jt(e) {
  Nt().$$.on_destroy.push(e);
}
const w = [],
  Q = [];
let E = [];
const W = [],
  kt = Promise.resolve();
let D = !1;
function At() {
  D || ((D = !0), kt.then(V));
}
function q(e) {
  E.push(e);
}
const z = new Set();
let b = 0;
function V() {
  if (b !== 0) return;
  const e = C;
  do {
    try {
      for (; b < w.length; ) {
        const t = w[b];
        b++, j(t), Ct(t.$$);
      }
    } catch (t) {
      throw ((w.length = 0), (b = 0), t);
    }
    for (j(null), w.length = 0, b = 0; Q.length; ) Q.pop()();
    for (let t = 0; t < E.length; t += 1) {
      const n = E[t];
      z.has(n) || (z.add(n), n());
    }
    E.length = 0;
  } while (w.length);
  for (; W.length; ) W.pop()();
  (D = !1), z.clear(), j(e);
}
function Ct(e) {
  if (e.fragment !== null) {
    e.update(), O(e.before_update);
    const t = e.dirty;
    (e.dirty = [-1]),
      e.fragment && e.fragment.p(e.ctx, t),
      e.after_update.forEach(q);
  }
}
function Pt(e) {
  const t = [],
    n = [];
  E.forEach((i) => (e.indexOf(i) === -1 ? t.push(i) : n.push(i))),
    n.forEach((i) => i()),
    (E = t);
}
let v;
function Lt() {
  return (
    v ||
      ((v = Promise.resolve()),
      v.then(() => {
        v = null;
      })),
    v
  );
}
function X(e, t, n) {
  e.dispatchEvent(yt(`${t ? "intro" : "outro"}${n}`));
}
const S = new Set();
let m;
function St() {
  m = { r: 0, c: [], p: m };
}
function Bt() {
  m.r || O(m.c), (m = m.p);
}
function B(e, t) {
  e && e.i && (S.delete(e), e.i(t));
}
function Y(e, t, n, i) {
  if (e && e.o) {
    if (S.has(e)) return;
    S.add(e),
      m.c.push(() => {
        S.delete(e), i && (n && e.d(1), i());
      }),
      e.o(t);
  } else i && i();
}
const Mt = { duration: 0 };
function Rt(e, t, n) {
  const i = { direction: "out" };
  let s = t(e, n, i),
    o = !0,
    r;
  const c = m;
  c.r += 1;
  let f;
  function u() {
    const {
      delay: a = 0,
      duration: l = 300,
      easing: d = tt,
      tick: h = k,
      css: _,
    } = s || Mt;
    _ && (r = Et(e, 1, 0, l, a, d, _));
    const p = $t() + a,
      g = p + l;
    q(() => X(e, !1, "start")),
      "inert" in e && ((f = e.inert), (e.inert = !0)),
      dt((y) => {
        if (o) {
          if (y >= g) return h(0, 1), X(e, !1, "end"), --c.r || O(c.c), !1;
          if (y >= p) {
            const K = d((y - p) / l);
            h(1 - K, K);
          }
        }
        return o;
      });
  }
  return (
    I(s)
      ? Lt().then(() => {
          (s = s(i)), u();
        })
      : u(),
    {
      end(a) {
        a && "inert" in e && (e.inert = f),
          a && s.tick && s.tick(1, 0),
          o && (r && Ot(e, r), (o = !1));
      },
    }
  );
}
function Tt(e, t, n) {
  const { fragment: i, after_update: s } = e.$$;
  i && i.m(t, n),
    q(() => {
      const o = e.$$.on_mount.map(et).filter(I);
      e.$$.on_destroy ? e.$$.on_destroy.push(...o) : O(o), (e.$$.on_mount = []);
    }),
    s.forEach(q);
}
function qt(e, t) {
  const n = e.$$;
  n.fragment !== null &&
    (Pt(n.after_update),
    O(n.on_destroy),
    n.fragment && n.fragment.d(t),
    (n.on_destroy = n.fragment = null),
    (n.ctx = []));
}
function zt(e, t) {
  e.$$.dirty[0] === -1 && (w.push(e), At(), e.$$.dirty.fill(0)),
    (e.$$.dirty[(t / 31) | 0] |= 1 << t % 31);
}
function Dt(e, t, n, i, s, o, r = null, c = [-1]) {
  const f = C;
  j(e);
  const u = (e.$$ = {
    fragment: null,
    ctx: [],
    props: o,
    update: k,
    not_equal: s,
    bound: U(),
    on_mount: [],
    on_destroy: [],
    on_disconnect: [],
    before_update: [],
    after_update: [],
    context: new Map(t.context || (f ? f.$$.context : [])),
    callbacks: U(),
    dirty: c,
    skip_bound: !1,
    root: t.target || f.$$.root,
  });
  r && r(u.root);
  let a = !1;
  if (
    ((u.ctx = n
      ? n(e, t.props || {}, (l, d, ...h) => {
          const _ = h.length ? h[0] : d;
          return (
            u.ctx &&
              s(u.ctx[l], (u.ctx[l] = _)) &&
              (!u.skip_bound && u.bound[l] && u.bound[l](_), a && zt(e, l)),
            d
          );
        })
      : []),
    u.update(),
    (a = !0),
    O(u.before_update),
    (u.fragment = i ? i(u.ctx) : !1),
    t.target)
  ) {
    if (t.hydrate) {
      const l = gt(t.target);
      u.fragment && u.fragment.l(l), l.forEach(P);
    } else u.fragment && u.fragment.c();
    t.intro && B(e.$$.fragment), Tt(e, t.target, t.anchor), V();
  }
  j(f);
}
let ot;
typeof HTMLElement == "function" &&
  (ot = class extends HTMLElement {
    constructor(t, n, i) {
      super();
      $(this, "$$ctor");
      $(this, "$$s");
      $(this, "$$c");
      $(this, "$$cn", !1);
      $(this, "$$d", {});
      $(this, "$$r", !1);
      $(this, "$$p_d", {});
      $(this, "$$l", {});
      $(this, "$$l_u", new Map());
      (this.$$ctor = t),
        (this.$$s = n),
        i && this.attachShadow({ mode: "open" });
    }
    addEventListener(t, n, i) {
      if (((this.$$l[t] = this.$$l[t] || []), this.$$l[t].push(n), this.$$c)) {
        const s = this.$$c.$on(t, n);
        this.$$l_u.set(n, s);
      }
      super.addEventListener(t, n, i);
    }
    removeEventListener(t, n, i) {
      if ((super.removeEventListener(t, n, i), this.$$c)) {
        const s = this.$$l_u.get(n);
        s && (s(), this.$$l_u.delete(n));
      }
    }
    async connectedCallback() {
      if (((this.$$cn = !0), !this.$$c)) {
        let n = function (r) {
          return () => {
            let c;
            return {
              c: function () {
                (c = A("slot")), r !== "default" && N(c, "name", r);
              },
              m: function (a, l) {
                J(a, c, l);
              },
              d: function (a) {
                a && P(c);
              },
            };
          };
        };
        var t = n;
        if ((await Promise.resolve(), !this.$$cn || this.$$c)) return;
        const i = {},
          s = bt(this);
        for (const r of this.$$s) r in s && (i[r] = [n(r)]);
        for (const r of this.attributes) {
          const c = this.$$g_p(r.name);
          c in this.$$d || (this.$$d[c] = M(c, r.value, this.$$p_d, "toProp"));
        }
        for (const r in this.$$p_d)
          !(r in this.$$d) &&
            this[r] !== void 0 &&
            ((this.$$d[r] = this[r]), delete this[r]);
        this.$$c = new this.$$ctor({
          target: this.shadowRoot || this,
          props: { ...this.$$d, $$slots: i, $$scope: { ctx: [] } },
        });
        const o = () => {
          this.$$r = !0;
          for (const r in this.$$p_d)
            if (
              ((this.$$d[r] = this.$$c.$$.ctx[this.$$c.$$.props[r]]),
              this.$$p_d[r].reflect)
            ) {
              const c = M(r, this.$$d[r], this.$$p_d, "toAttribute");
              c == null
                ? this.removeAttribute(this.$$p_d[r].attribute || r)
                : this.setAttribute(this.$$p_d[r].attribute || r, c);
            }
          this.$$r = !1;
        };
        this.$$c.$$.after_update.push(o), o();
        for (const r in this.$$l)
          for (const c of this.$$l[r]) {
            const f = this.$$c.$on(r, c);
            this.$$l_u.set(c, f);
          }
        this.$$l = {};
      }
    }
    attributeChangedCallback(t, n, i) {
      var s;
      this.$$r ||
        ((t = this.$$g_p(t)),
        (this.$$d[t] = M(t, i, this.$$p_d, "toProp")),
        (s = this.$$c) == null || s.$set({ [t]: this.$$d[t] }));
    }
    disconnectedCallback() {
      (this.$$cn = !1),
        Promise.resolve().then(() => {
          this.$$cn || (this.$$c.$destroy(), (this.$$c = void 0));
        });
    }
    $$g_p(t) {
      return (
        Object.keys(this.$$p_d).find(
          (n) =>
            this.$$p_d[n].attribute === t ||
            (!this.$$p_d[n].attribute && n.toLowerCase() === t)
        ) || t
      );
    }
  });
function M(e, t, n, i) {
  var o;
  const s = (o = n[e]) == null ? void 0 : o.type;
  if (
    ((t = s === "Boolean" && typeof t != "boolean" ? t != null : t),
    !i || !n[e])
  )
    return t;
  if (i === "toAttribute")
    switch (s) {
      case "Object":
      case "Array":
        return t == null ? null : JSON.stringify(t);
      case "Boolean":
        return t ? "" : null;
      case "Number":
        return t ?? null;
      default:
        return t;
    }
  else
    switch (s) {
      case "Object":
      case "Array":
        return t && JSON.parse(t);
      case "Boolean":
        return t;
      case "Number":
        return t != null ? +t : t;
      default:
        return t;
    }
}
function It(e, t, n, i, s, o) {
  let r = class extends ot {
    constructor() {
      super(e, n, s), (this.$$p_d = t);
    }
    static get observedAttributes() {
      return Object.keys(t).map((c) => (t[c].attribute || c).toLowerCase());
    }
  };
  return (
    Object.keys(t).forEach((c) => {
      Object.defineProperty(r.prototype, c, {
        get() {
          return this.$$c && c in this.$$c ? this.$$c[c] : this.$$d[c];
        },
        set(f) {
          var u;
          (f = M(c, f, t)),
            (this.$$d[c] = f),
            (u = this.$$c) == null || u.$set({ [c]: f });
        },
      });
    }),
    i.forEach((c) => {
      Object.defineProperty(r.prototype, c, {
        get() {
          var f;
          return (f = this.$$c) == null ? void 0 : f[c];
        },
      });
    }),
    o && (r = o(r)),
    (e.element = r),
    r
  );
}
class Ft {
  constructor() {
    $(this, "$$");
    $(this, "$$set");
  }
  $destroy() {
    qt(this, 1), (this.$destroy = k);
  }
  $on(t, n) {
    if (!I(n)) return k;
    const i = this.$$.callbacks[t] || (this.$$.callbacks[t] = []);
    return (
      i.push(n),
      () => {
        const s = i.indexOf(n);
        s !== -1 && i.splice(s, 1);
      }
    );
  }
  $set(t) {
    this.$$set &&
      !at(t) &&
      ((this.$$.skip_bound = !0), this.$$set(t), (this.$$.skip_bound = !1));
  }
}
const Ht = "4";
typeof window < "u" &&
  (window.__svelte || (window.__svelte = { v: new Set() })).v.add(Ht);
function Jt(e, { delay: t = 0, duration: n = 400, easing: i = tt } = {}) {
  const s = +getComputedStyle(e).opacity;
  return { delay: t, duration: n, easing: i, css: (o) => `opacity: ${o * s}` };
}
function Vt(e) {
  ht(
    e,
    "svelte-gfjrl",
    "div.svelte-gfjrl{background-color:white;width:100%;height:100%;display:flex;flex-direction:row;justify-content:center;align-items:center;position:fixed;z-index:9999;}"
  );
}
function Z(e) {
  let t, n, i, s, o;
  return {
    c() {
      (t = A("div")),
        (n = A("img")),
        G(n.src, (i = e[0])) || N(n, "src", i),
        N(n, "alt", "animation"),
        N(t, "class", "svelte-gfjrl");
    },
    m(r, c) {
      J(r, t, c), st(t, n), (o = !0);
    },
    p(r, c) {
      (!o || (c & 1 && !G(n.src, (i = r[0])))) && N(n, "src", i);
    },
    i(r) {
      o || (s && s.end(1), (o = !0));
    },
    o(r) {
      r && (s = Rt(t, Jt, { duration: 200 })), (o = !1);
    },
    d(r) {
      r && P(t), r && s && s.end();
    },
  };
}
function Kt(e) {
  let t,
    n = e[1] && Z(e);
  return {
    c() {
      n && n.c(), (t = pt());
    },
    m(i, s) {
      n && n.m(i, s), J(i, t, s);
    },
    p(i, [s]) {
      i[1]
        ? n
          ? (n.p(i, s), s & 2 && B(n, 1))
          : ((n = Z(i)), n.c(), B(n, 1), n.m(t.parentNode, t))
        : n &&
          (St(),
          Y(n, 1, 1, () => {
            n = null;
          }),
          Bt());
    },
    i(i) {
      B(n);
    },
    o(i) {
      Y(n);
    },
    d(i) {
      i && P(t), n && n.d(i);
    },
  };
}
function Ut(e, t, n) {
  let { image: i = "https://i.ibb.co/zNrPNwm/intro.gif" } = t,
    s = !0,
    o = setTimeout(() => {
      n(1, (s = !1));
    }, 4850);
  return (
    jt(() => {
      clearTimeout(o);
    }),
    (e.$$set = (r) => {
      "image" in r && n(0, (i = r.image));
    }),
    [i, s]
  );
}
class ct extends Ft {
  constructor(t) {
    super(), Dt(this, t, Ut, Kt, lt, { image: 0 }, Vt);
  }
  get image() {
    return this.$$.ctx[0];
  }
  set image(t) {
    this.$$set({ image: t }), V();
  }
}
customElements.define("intro-animation", It(ct, { image: {} }, [], [], !0));
