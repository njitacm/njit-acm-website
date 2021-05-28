/* */ 
System.register(["./http-response-message", "aurelia-path"], function (_export) {
  "use strict";

  var HttpResponseMessage, join, buildQueryString, _prototypeProperties, RequestMessageProcessor;


  function buildFullUri(message) {
    var uri = join(message.baseUrl, message.uri),
        qs;

    if (message.params) {
      qs = buildQueryString(message.params);
      uri = qs ? "" + uri + "?" + qs : uri;
    }

    message.fullUri = uri;
  }

  return {
    setters: [function (_httpResponseMessage) {
      HttpResponseMessage = _httpResponseMessage.HttpResponseMessage;
    }, function (_aureliaPath) {
      join = _aureliaPath.join;
      buildQueryString = _aureliaPath.buildQueryString;
    }],
    execute: function () {
      _prototypeProperties = function (child, staticProps, instanceProps) { if (staticProps) Object.defineProperties(child, staticProps); if (instanceProps) Object.defineProperties(child.prototype, instanceProps); };

      RequestMessageProcessor = _export("RequestMessageProcessor", (function () {
        function RequestMessageProcessor(xhrType, transformers) {
          this.XHRType = xhrType;
          this.transformers = transformers;
        }

        _prototypeProperties(RequestMessageProcessor, null, {
          abort: {
            value: function abort() {
              this.xhr.abort();
            },
            writable: true,
            configurable: true
          },
          process: {
            value: function process(client, message) {
              var _this = this;
              return new Promise(function (resolve, reject) {
                var xhr = _this.xhr = new _this.XHRType(),
                    transformers = _this.transformers,
                    i,
                    ii;

                buildFullUri(message);
                xhr.open(message.method, message.fullUri, true);

                for (i = 0, ii = transformers.length; i < ii; ++i) {
                  transformers[i](client, _this, message, xhr);
                }

                xhr.onload = function (e) {
                  var response = new HttpResponseMessage(message, xhr, message.responseType, message.reviver);
                  if (response.isSuccess) {
                    resolve(response);
                  } else {
                    reject(response);
                  }
                };

                xhr.ontimeout = function (e) {
                  reject(new HttpResponseMessage(message, {
                    response: e,
                    status: xhr.status,
                    statusText: xhr.statusText
                  }, "timeout"));
                };

                xhr.onerror = function (e) {
                  reject(new HttpResponseMessage(message, {
                    response: e,
                    status: xhr.status,
                    statusText: xhr.statusText
                  }, "error"));
                };

                xhr.onabort = function (e) {
                  reject(new HttpResponseMessage(message, {
                    response: e,
                    status: xhr.status,
                    statusText: xhr.statusText
                  }, "abort"));
                };

                xhr.send(message.content);
              });
            },
            writable: true,
            configurable: true
          }
        });

        return RequestMessageProcessor;
      })());
    }
  };
});