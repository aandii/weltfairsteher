entityMap =
  '&': '&amp;'
  '<': '&lt;'
  '>': '&gt;'
  '"': '&quot;'
  '\'': '&#39;'
  '/': '&#x2F;'

escapeHtml = (string) -> String(string).replace /[&<>"'\/]/g, (s) -> entityMap[s]

window.callApi = (api, data, cb) ->
  $.post("api/#{api}.php", data).done (errors) ->
    console.log errors
    errors = JSON.parse(errors)
    cb? errors


window.sendForm = (form) ->
  dest = $(form).attr("id")
  window.callApi dest, $("##{dest}").serialize(), (errors) ->
    resultDiv = $("##{dest} > .result")
    if !resultDiv.length
      resultDiv = $("<div class='result'></div>")
      resultDiv.appendTo("##{dest}")
    resultDiv.empty()
    if errors.length
      list = $("<ul></ul>")
      for error in errors
        list.append("<li>#{escapeHtml(error)}</li>")
      resultDiv.append(list)
    else
      resultDiv.append("<b>Erfolgreich!</b>")


  return false