export default {
  setHeadTitle (state, title) {
    state.headTitle = title
  },
  setHeadUrl (state, backUrl) {
    state.backUrl = backUrl
  },
  setCurUser (state, curUser) {
    state.curUser = curUser
  },
  getCurUser (state) {
    let curUser = JSON.parse(localStorage.getItem('curUser'))
    if (curUser) {
      state.curUser = curUser
    }
  },
  setSelected (state, selected) {
    state.selected = selected
  }
}

