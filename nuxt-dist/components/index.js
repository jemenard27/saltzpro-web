export { default as NuxtLogo } from '../..\\components\\NuxtLogo.vue'
export { default as Tutorial } from '../..\\components\\Tutorial.vue'
export { default as CardBet } from '../..\\components\\card\\Bet.vue'
export { default as CardConfirmation } from '../..\\components\\card\\Confirmation.vue'
export { default as CardPageSelection } from '../..\\components\\card\\PageSelection.vue'
export { default as LayoutFooter } from '../..\\components\\layout\\Footer.vue'
export { default as LayoutHeader } from '../..\\components\\layout\\Header.vue'
export { default as LayoutMobileFooter } from '../..\\components\\layout\\MobileFooter.vue'
export { default as LayoutTopbar } from '../..\\components\\layout\\Topbar.vue'

// nuxt/nuxt.js#8607
function wrapFunctional(options) {
  if (!options || !options.functional) {
    return options
  }

  const propKeys = Array.isArray(options.props) ? options.props : Object.keys(options.props || {})

  return {
    render(h) {
      const attrs = {}
      const props = {}

      for (const key in this.$attrs) {
        if (propKeys.includes(key)) {
          props[key] = this.$attrs[key]
        } else {
          attrs[key] = this.$attrs[key]
        }
      }

      return h(options, {
        on: this.$listeners,
        attrs,
        props,
        scopedSlots: this.$scopedSlots,
      }, this.$slots.default)
    }
  }
}
