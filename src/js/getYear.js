import $ from 'jquery'

const config = {
  el: '.js-year'
}

export const getYear = () => {
  const year =  new Date().getFullYear()
  $(config.el).text(year);
}

