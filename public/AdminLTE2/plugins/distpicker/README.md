# Distpicker

[![CDNJS](https://img.shields.io/cdnjs/v/distpicker.svg)](https://cdnjs.com/libraries/distpicker)

> A simple jQuery plugin for picking provinces, cities and districts of China.

- [Website](https://fengyuanchen.github.io/distpicker)



## Table of contents

- [Main](#main)
- [Getting started](#getting-started)
- [Options](#options)
- [Methods](#methods)
- [No conflict](#no-conflict)
- [Browser support](#browser-support)
- [License](#license)



## Main

```
dist/
├── distpicker.js     (98 KB)
└── distpicker.min.js (71 KB)
```



## Getting started


### Quick start

Four quick start options are available:

- [Download the latest release](https://github.com/fengyuanchen/distpicker/archive/master.zip).
- Clone the repository: `git clone https://github.com/fengyuanchen/distpicker.git`.
- Install with [NPM](https://npmjs.com): `npm install distpicker`.
- Install with [Bower](https://bower.io): `bower install distpicker`.


### Installation

Include files:

```html
<script src="/path/to/jquery.js"></script><!-- jQuery is required -->
<script src="/path/to/distpicker.js"></script>
```


Create HTML elements:

```html
<div><!-- container -->
  <select></select><!-- province -->
  <select></select><!-- city -->
  <select></select><!-- district -->
</div>
```



### Usage

#### Initialize with `data-toggle="distpicker"` attribute


Basic

```html
<div data-toggle="distpicker">
  <select></select>
  <select></select>
  <select></select>
</div>
```


Custom placeholders

```html
<div data-toggle="distpicker">
  <select data-province="---- 选择省 ----"></select>
  <select data-city="---- 选择市 ----"></select>
  <select data-district="---- 选择区 ----"></select>
</div>
```


Custom districts

```html
<div data-toggle="distpicker">
  <select data-province="浙江省"></select>
  <select data-city="杭州市"></select>
  <select data-district="西湖区"></select>
</div>
```


#### Initialize with `$.fn.distpicker` method

Basic

```js
$('#target').distpicker();
```

Custom placeholders

```js
$('#target').distpicker({
  province: '---- 所在省 ----',
  city: '---- 所在市 ----',
  district: '---- 所在区 ----'
});
```

Custom districts

```js
$('#target').distpicker({
  province: '浙江省',
  city: '杭州市',
  district: '西湖区'
});
```


[⬆ back to top](#table-of-contents)



## Options

- Change the default options with `$().distpicker(options)`.
- Change the global default options with `$.fn.distpicker.setDefaults(options)`.

Also supports to set the options by `data-*` attributes:

```html
<div data-toggle="distpicker" data-autoselect="3" data-province="浙江省">...</div>
```

### autoselect

- Type: `Number`
- Options:
  - `0`: Disable autoselect.
  - `1`: Autoselect province only.
  - `2`: Autoselect province and city only.
  - `3`: Autoselect all (province, city and district).
- Default: `0`

Selects the districts automatically.


### placeholder

- Type: `Boolean`
- Default: `true`

Show placeholder (with an `<option>` element).


### valueType

- Type: `String`
- Oprions:
  - `'name'`: administrative division name.
  - `'code'`: administrative division code.
- Default: `'name'`

Defines the value type of the `<select>` element.


### province

- Type: `String`
- Default: `—— 省 ——`

Defines the initial value of province `<select>`. If it is a valid province, it will be selected. If not, it will be used as a placeholder.


### city

- Type: `String`
- Default: `—— 市 ——`

Defines the initial value of city `<select>`. If it is a valid city under the selected province, it will be selected. If not, it will be used as a placeholder.


### district

- Type: `String`
- Default: `—— 区 ——`

Defines the initial value of district `<select>`. If it is a valid district under the selected city, it will be selected. If not, it will be used as a placeholder.


[⬆ back to top](#table-of-contents)



## Methods

### getDistricts([districtCode])

- **districtCode** (optional):
  - Type: `Number`
  - The district code of target country, province or city.
  - If not present, will return all the districts.

- (return value):
  - Type: `Object`

Get districts data.

```js
$().distpicker('getDistricts'); // 中国
$().distpicker('getDistricts', 330000); // 浙江省
$().distpicker('getDistricts', 330100); // 杭州市
```

### reset([deep])

- **deep** (optional):
  - Type: `Boolean`
  - Default: `false`
  - Reset the selects to default states (Undo selected).

Reset the selects to the initial states (Undo changed).

```js
$().distpicker('reset');
$().distpicker('reset', true);
```

### destroy()

Destroy the distpicker instance, but keep the selected districts.

If you want to remove the selected districts, you can call `reset` method first and then call this method.


[⬆ back to top](#table-of-contents)



## No conflict

If you have to use other plugin with the same namespace, just call the `$.fn.distpicker.noConflict` method to revert to it.

```html
<script src="other-plugin.js"></script>
<script src="distpicker.js"></script>
<script>
  $.fn.distpicker.noConflict();
  // Code that uses other plugin's "$().distpicker" can follow here.
</script>
```



## Browser support

- Chrome (latest)
- Firefox (latest)
- Safari (latest)
- Opera (latest)
- Edge (latest)
- Internet Explorer 8+

As a jQuery plugin, you also need to see the [jQuery Browser Support](http://jquery.com/browser-support/).



## License

[MIT](http://opensource.org/licenses/MIT) © [Fengyuan Chen](http://chenfengyuan.com)


[⬆ back to top](#table-of-contents)
