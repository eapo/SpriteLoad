# SpriteLoad
PHP script to load a single SVG from [*Sprite*](https://en.wikipedia.org/wiki/Sprite_(computer_graphics)) using `GET` query

## Examples
### Default icon is set to `file-o`
```html
<img src="https://hej.valto.ro/brand/data/theme/svg.php" height="32" />
```
<img src="https://hej.valto.ro/brand/data/theme/svg.php" height="32" />

### Query can set by `?q=` at the end of the URL
```html
<img src="https://hej.valto.ro/brand/data/theme/svg.php?q=icons" height="32" />
```
<img src="https://hej.valto.ro/brand/data/theme/svg.php?q=icons" height="32" />

### Color can set by `&c=` using [*Hex_triplet*](https://en.wikipedia.org/wiki/Web_colors#Hex_triplet)
```diff
! Colors can set without "#"
+ default is `369369`
```

```html
<img src="https://hej.valto.ro/brand/data/theme/svg.php?q=icons&c=963963" height="32" />
```
<img src="https://hej.valto.ro/brand/data/theme/svg.php?q=icons&c=963963" height="32" />
