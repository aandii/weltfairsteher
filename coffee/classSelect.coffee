window.window.selectedClass = null
classSelectChanged = []
setClass = (newClass) ->
  console.log 'setClass:', newClass
  $('.class-' + window.selectedClass).removeClass 'class-selected'
  window.selectedClass = newClass
  localStorage.setItem 'selectedClass', window.selectedClass
  $('.class-value').val window.selectedClass
  $('.class-' + window.selectedClass).addClass 'class-selected'

  f(window.selectedClass) for f in classSelectChanged
  return

window.onClassSelectChanged = (f) ->
  f window.selectedClass if window.selectedClass?
  classSelectChanged.push f

$('document').ready ->
  window.selectedClass = localStorage.getItem('selectedClass')

  classes = []
  $('#class-select option').each (v, a) -> classes.push $(a).prop('value')

  window.selectedClass = classes[0] if !window.selectedClass? or classes.indexOf(window.selectedClass) == -1

  classSelect = $('#class-select')
  classSelect.val window.selectedClass
  setClass window.selectedClass

  classSelect.on 'change', ->
    setClass @value
    return