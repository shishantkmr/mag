/*
 * jQuery FriendURL plugin 1.7.2
 *
 * https://projects.zinoui.com/friendurl/
 *
 * Copyright (c) 2009-2018 Dimitar Ivanov
 *
 * Dual licensed under the MIT and GPL licenses:
 *   http://www.opensource.org/licenses/mit-license.php
 *   http://www.gnu.org/licenses/gpl.html
 * 
 * Bugfixed by: Vitaliy Stepanenko (http://nayjest.ru)
 * Improved by: Komesz (https://github.com/Komesz)  
 */
(function ($, undefined) {
	
	var cyrillic = [
		"а", "б", "в", "г", "д", "е", "ж", "з", "и", "й", "к", "л", "м", "н", "о",
		"п", "р", "с", "т", "у", "ф", "х", "ц", "ч", "ш", "щ", "ъ", "ь", "ю", "я",
		"А", "Б", "В", "Г", "Д", "Е", "Ж", "З", "И", "Й", "К", "Л", "М", "Н", "О", 
		"П", "Р", "С", "Т", "У", "Ф", "Х", "Ц", "Ч", "Ш", "Щ", "Ъ", "Ь", "Ю", "Я",
		"Ї", "ї", "Є", "є", "Ы", "ы", "Ё", "ё",
		"ı", "İ", "ğ", "Ğ", "ü", "Ü", "ş", "Ş", "ö", "Ö", "ç", "Ç",
		"Á", "á", "Â", "â", "Ã", "ã", "À", "à", "Ç", "ç", "É", "é", "Ê", "ê", "Í", 
		"í", "Ó", "ó", "Ô", "ô", "Õ", "õ", "Ú", "ú", "Ñ", "ñ", "È", "è",
		"ű", "Ű", "ő", "Ő"
	];

	var latin = [
		"a", "b", "v", "g", "d", "e", "zh", "z", "i", "y", "k", "l", "m", "n", "o", 
		"p", "r", "s", "t", "u", "f", "h", "ts", "ch", "sh", "sht", "a", "y", "yu", "ya",
		"A", "B", "B", "G", "D", "E", "Zh", "Z", "I", "Y", "K", "L", "M", "N", "O", 
		"P", "R", "S", "T", "U", "F", "H", "Ts", "Ch", "Sh", "Sht", "A", "Y", "Yu", "Ya",
		"I", "i", "Ye", "ye", "I", "i", "Yo", "yo",
		"i", "I", "g", "G", "u", "U", "s", "S", "o", "O", "c", "C",
		"A", "a", "A", "a", "A", "a", "A", "a", "C", "c", "E", "e", "E", "e", "I",
		"i", "O", "o", "O", "o", "O", "o", "U", "u", "N", "n", "E", "e",
		"u", "U", "o", "O"
	];
	
	var string = '';
	
	function convert (text) {
		string = str_replace(cyrillic, latin, text);
		return string;
	}
		
	function str_replace (search, replace, subject, count) {	
	    var i = 0, j = 0, temp = '', repl = '', sl = 0, fl = 0,
	            f = [].concat(search),
	            r = [].concat(replace),
	            s = subject,
	            ra = r instanceof Array, sa = s instanceof Array;
	    s = [].concat(s);
	    if (count) {
	        this.window[count] = 0;
	    }
	
	    for (i=0, sl=s.length; i < sl; i++) {
	        if (s[i] === '') {
	            continue;
	        }
	        for (j=0, fl=f.length; j < fl; j++) {
	            temp = s[i]+'';
	            repl = ra ? (r[j] !== undefined ? r[j] : '') : r[0];
	            s[i] = (temp).split(f[j]).join(repl);
	            if (count && s[i] !== temp) {
	                this.window[count] += (temp.length-s[i].length)/f[j].length;}
	        }
	    }
	    return sa ? s : s[0];
	}
	
	function Friendurl () {
		this.defaults = {
			divider : '-',
			transliterate: false
		};
	}
	
	Friendurl.prototype = {
		_initFriendurl: function (target, options) {
			var self = this;
			$(target).keyup(function () {
				options = $.extend({}, self.defaults, options);

				var url = $(this).val();
				
				if (options.transliterate) {
    					url = convert(url);
    				}

				url = url
					.toLowerCase() // change everything to lowercase
					.replace(/^\s+|\s+$/g, "") // trim leading and trailing spaces		
					.replace(/[_|\s]+/g, "-") // change all spaces and underscores to a hyphen
					.replace(/[^a-z\u0400-\u04FF0-9-]+/g, "") // remove all non-cyrillic, non-numeric characters except the hyphen
					.replace(/[-]+/g, "-") // replace multiple instances of the hyphen with a single instance
					.replace(/^-+|-+$/g, "") // trim leading and trailing hyphens
					.replace(/[-]+/g, options.divider)				
				;
    			
				var $el = $('#' + options.id);

				if ($el.length > 0) {
					var nodeName = $el.get(0).tagName;
					switch (nodeName) {
					case 'INPUT':
						$el.val(url);
						break;
					default:
						$el.text(url);
					}
				}
			});
		}
	};
	
	$.friendurl = new Friendurl();
	$.friendurl.version = "1.7.2";
	
	$.fn.friendurl = function (options) {	
		return this.each(function () {
			$.friendurl._initFriendurl(this, options);
		});
	};
})(jQuery);