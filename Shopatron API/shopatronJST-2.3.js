// Load Underscore for templating
//     Underscore.js 1.3.3
//     (c) 2009-2012 Jeremy Ashkenas, DocumentCloud Inc.
//     Underscore is freely distributable under the MIT license.
//     Portions of Underscore are inspired or borrowed from Prototype,
//     Oliver Steele's Functional, and John Resig's Micro-Templating.
//     For all details and documentation:
//     http://documentcloud.github.com/underscore

(function() {

  // Baseline setup
  // --------------

  // Establish the root object, `window` in the browser, or `global` on the server.
  var root = this;

  // Save the previous value of the `_` variable.
  var previousUnderscore = root._;

  // Establish the object that gets returned to break out of a loop iteration.
  var breaker = {};

  // Save bytes in the minified (but not gzipped) version:
  var ArrayProto = Array.prototype, ObjProto = Object.prototype, FuncProto = Function.prototype;

  // Create quick reference variables for speed access to core prototypes.
  var slice            = ArrayProto.slice,
      unshift          = ArrayProto.unshift,
      toString         = ObjProto.toString,
      hasOwnProperty   = ObjProto.hasOwnProperty;

  // All **ECMAScript 5** native function implementations that we hope to use
  // are declared here.
  var
    nativeForEach      = ArrayProto.forEach,
    nativeMap          = ArrayProto.map,
    nativeReduce       = ArrayProto.reduce,
    nativeReduceRight  = ArrayProto.reduceRight,
    nativeFilter       = ArrayProto.filter,
    nativeEvery        = ArrayProto.every,
    nativeSome         = ArrayProto.some,
    nativeIndexOf      = ArrayProto.indexOf,
    nativeLastIndexOf  = ArrayProto.lastIndexOf,
    nativeIsArray      = Array.isArray,
    nativeKeys         = Object.keys,
    nativeBind         = FuncProto.bind;

  // Create a safe reference to the Underscore object for use below.
  var _ = function(obj) { return new wrapper(obj); };

  // Export the Underscore object for **Node.js**, with
  // backwards-compatibility for the old `require()` API. If we're in
  // the browser, add `_` as a global object via a string identifier,
  // for Closure Compiler "advanced" mode.
  if (typeof exports !== 'undefined') {
    if (typeof module !== 'undefined' && module.exports) {
      exports = module.exports = _;
    }
    exports._ = _;
  } else {
    root['_'] = _;
  }

  // Current version.
  _.VERSION = '1.3.3';

  // Collection Functions
  // --------------------

  // The cornerstone, an `each` implementation, aka `forEach`.
  // Handles objects with the built-in `forEach`, arrays, and raw objects.
  // Delegates to **ECMAScript 5**'s native `forEach` if available.
  var each = _.each = _.forEach = function(obj, iterator, context) {
    if (obj == null) return;
    if (nativeForEach && obj.forEach === nativeForEach) {
      obj.forEach(iterator, context);
    } else if (obj.length === +obj.length) {
      for (var i = 0, l = obj.length; i < l; i++) {
        if (i in obj && iterator.call(context, obj[i], i, obj) === breaker) return;
      }
    } else {
      for (var key in obj) {
        if (_.has(obj, key)) {
          if (iterator.call(context, obj[key], key, obj) === breaker) return;
        }
      }
    }
  };

  // Return the results of applying the iterator to each element.
  // Delegates to **ECMAScript 5**'s native `map` if available.
  _.map = _.collect = function(obj, iterator, context) {
    var results = [];
    if (obj == null) return results;
    if (nativeMap && obj.map === nativeMap) return obj.map(iterator, context);
    each(obj, function(value, index, list) {
      results[results.length] = iterator.call(context, value, index, list);
    });
    if (obj.length === +obj.length) results.length = obj.length;
    return results;
  };

  // **Reduce** builds up a single result from a list of values, aka `inject`,
  // or `foldl`. Delegates to **ECMAScript 5**'s native `reduce` if available.
  _.reduce = _.foldl = _.inject = function(obj, iterator, memo, context) {
    var initial = arguments.length > 2;
    if (obj == null) obj = [];
    if (nativeReduce && obj.reduce === nativeReduce) {
      if (context) iterator = _.bind(iterator, context);
      return initial ? obj.reduce(iterator, memo) : obj.reduce(iterator);
    }
    each(obj, function(value, index, list) {
      if (!initial) {
        memo = value;
        initial = true;
      } else {
        memo = iterator.call(context, memo, value, index, list);
      }
    });
    if (!initial) throw new TypeError('Reduce of empty array with no initial value');
    return memo;
  };

  // The right-associative version of reduce, also known as `foldr`.
  // Delegates to **ECMAScript 5**'s native `reduceRight` if available.
  _.reduceRight = _.foldr = function(obj, iterator, memo, context) {
    var initial = arguments.length > 2;
    if (obj == null) obj = [];
    if (nativeReduceRight && obj.reduceRight === nativeReduceRight) {
      if (context) iterator = _.bind(iterator, context);
      return initial ? obj.reduceRight(iterator, memo) : obj.reduceRight(iterator);
    }
    var reversed = _.toArray(obj).reverse();
    if (context && !initial) iterator = _.bind(iterator, context);
    return initial ? _.reduce(reversed, iterator, memo, context) : _.reduce(reversed, iterator);
  };

  // Return the first value which passes a truth test. Aliased as `detect`.
  _.find = _.detect = function(obj, iterator, context) {
    var result;
    any(obj, function(value, index, list) {
      if (iterator.call(context, value, index, list)) {
        result = value;
        return true;
      }
    });
    return result;
  };

  // Return all the elements that pass a truth test.
  // Delegates to **ECMAScript 5**'s native `filter` if available.
  // Aliased as `select`.
  _.filter = _.select = function(obj, iterator, context) {
    var results = [];
    if (obj == null) return results;
    if (nativeFilter && obj.filter === nativeFilter) return obj.filter(iterator, context);
    each(obj, function(value, index, list) {
      if (iterator.call(context, value, index, list)) results[results.length] = value;
    });
    return results;
  };

  // Return all the elements for which a truth test fails.
  _.reject = function(obj, iterator, context) {
    var results = [];
    if (obj == null) return results;
    each(obj, function(value, index, list) {
      if (!iterator.call(context, value, index, list)) results[results.length] = value;
    });
    return results;
  };

  // Determine whether all of the elements match a truth test.
  // Delegates to **ECMAScript 5**'s native `every` if available.
  // Aliased as `all`.
  _.every = _.all = function(obj, iterator, context) {
    var result = true;
    if (obj == null) return result;
    if (nativeEvery && obj.every === nativeEvery) return obj.every(iterator, context);
    each(obj, function(value, index, list) {
      if (!(result = result && iterator.call(context, value, index, list))) return breaker;
    });
    return !!result;
  };

  // Determine if at least one element in the object matches a truth test.
  // Delegates to **ECMAScript 5**'s native `some` if available.
  // Aliased as `any`.
  var any = _.some = _.any = function(obj, iterator, context) {
    iterator || (iterator = _.identity);
    var result = false;
    if (obj == null) return result;
    if (nativeSome && obj.some === nativeSome) return obj.some(iterator, context);
    each(obj, function(value, index, list) {
      if (result || (result = iterator.call(context, value, index, list))) return breaker;
    });
    return !!result;
  };

  // Determine if a given value is included in the array or object using `===`.
  // Aliased as `contains`.
  _.include = _.contains = function(obj, target) {
    var found = false;
    if (obj == null) return found;
    if (nativeIndexOf && obj.indexOf === nativeIndexOf) return obj.indexOf(target) != -1;
    found = any(obj, function(value) {
      return value === target;
    });
    return found;
  };

  // Invoke a method (with arguments) on every item in a collection.
  _.invoke = function(obj, method) {
    var args = slice.call(arguments, 2);
    return _.map(obj, function(value) {
      return (_.isFunction(method) ? method || value : value[method]).apply(value, args);
    });
  };

  // Convenience version of a common use case of `map`: fetching a property.
  _.pluck = function(obj, key) {
    return _.map(obj, function(value){ return value[key]; });
  };

  // Return the maximum element or (element-based computation).
  _.max = function(obj, iterator, context) {
    if (!iterator && _.isArray(obj) && obj[0] === +obj[0]) return Math.max.apply(Math, obj);
    if (!iterator && _.isEmpty(obj)) return -Infinity;
    var result = {computed : -Infinity};
    each(obj, function(value, index, list) {
      var computed = iterator ? iterator.call(context, value, index, list) : value;
      computed >= result.computed && (result = {value : value, computed : computed});
    });
    return result.value;
  };

  // Return the minimum element (or element-based computation).
  _.min = function(obj, iterator, context) {
    if (!iterator && _.isArray(obj) && obj[0] === +obj[0]) return Math.min.apply(Math, obj);
    if (!iterator && _.isEmpty(obj)) return Infinity;
    var result = {computed : Infinity};
    each(obj, function(value, index, list) {
      var computed = iterator ? iterator.call(context, value, index, list) : value;
      computed < result.computed && (result = {value : value, computed : computed});
    });
    return result.value;
  };

  // Shuffle an array.
  _.shuffle = function(obj) {
    var shuffled = [], rand;
    each(obj, function(value, index, list) {
      rand = Math.floor(Math.random() * (index + 1));
      shuffled[index] = shuffled[rand];
      shuffled[rand] = value;
    });
    return shuffled;
  };

  // Sort the object's values by a criterion produced by an iterator.
  _.sortBy = function(obj, val, context) {
    var iterator = _.isFunction(val) ? val : function(obj) { return obj[val]; };
    return _.pluck(_.map(obj, function(value, index, list) {
      return {
        value : value,
        criteria : iterator.call(context, value, index, list)
      };
    }).sort(function(left, right) {
      var a = left.criteria, b = right.criteria;
      if (a === void 0) return 1;
      if (b === void 0) return -1;
      return a < b ? -1 : a > b ? 1 : 0;
    }), 'value');
  };

  // Groups the object's values by a criterion. Pass either a string attribute
  // to group by, or a function that returns the criterion.
  _.groupBy = function(obj, val) {
    var result = {};
    var iterator = _.isFunction(val) ? val : function(obj) { return obj[val]; };
    each(obj, function(value, index) {
      var key = iterator(value, index);
      (result[key] || (result[key] = [])).push(value);
    });
    return result;
  };

  // Use a comparator function to figure out at what index an object should
  // be inserted so as to maintain order. Uses binary search.
  _.sortedIndex = function(array, obj, iterator) {
    iterator || (iterator = _.identity);
    var low = 0, high = array.length;
    while (low < high) {
      var mid = (low + high) >> 1;
      iterator(array[mid]) < iterator(obj) ? low = mid + 1 : high = mid;
    }
    return low;
  };

  // Safely convert anything iterable into a real, live array.
  _.toArray = function(obj) {
    if (!obj)                                     return [];
    if (_.isArray(obj))                           return slice.call(obj);
    if (_.isArguments(obj))                       return slice.call(obj);
    if (obj.toArray && _.isFunction(obj.toArray)) return obj.toArray();
    return _.values(obj);
  };

  // Return the number of elements in an object.
  _.size = function(obj) {
    return _.isArray(obj) ? obj.length : _.keys(obj).length;
  };

  // Array Functions
  // ---------------

  // Get the first element of an array. Passing **n** will return the first N
  // values in the array. Aliased as `head` and `take`. The **guard** check
  // allows it to work with `_.map`.
  _.first = _.head = _.take = function(array, n, guard) {
    return (n != null) && !guard ? slice.call(array, 0, n) : array[0];
  };

  // Returns everything but the last entry of the array. Especcialy useful on
  // the arguments object. Passing **n** will return all the values in
  // the array, excluding the last N. The **guard** check allows it to work with
  // `_.map`.
  _.initial = function(array, n, guard) {
    return slice.call(array, 0, array.length - ((n == null) || guard ? 1 : n));
  };

  // Get the last element of an array. Passing **n** will return the last N
  // values in the array. The **guard** check allows it to work with `_.map`.
  _.last = function(array, n, guard) {
    if ((n != null) && !guard) {
      return slice.call(array, Math.max(array.length - n, 0));
    } else {
      return array[array.length - 1];
    }
  };

  // Returns everything but the first entry of the array. Aliased as `tail`.
  // Especially useful on the arguments object. Passing an **index** will return
  // the rest of the values in the array from that index onward. The **guard**
  // check allows it to work with `_.map`.
  _.rest = _.tail = function(array, index, guard) {
    return slice.call(array, (index == null) || guard ? 1 : index);
  };

  // Trim out all falsy values from an array.
  _.compact = function(array) {
    return _.filter(array, function(value){ return !!value; });
  };

  // Return a completely flattened version of an array.
  _.flatten = function(array, shallow) {
    return _.reduce(array, function(memo, value) {
      if (_.isArray(value)) return memo.concat(shallow ? value : _.flatten(value));
      memo[memo.length] = value;
      return memo;
    }, []);
  };

  // Return a version of the array that does not contain the specified value(s).
  _.without = function(array) {
    return _.difference(array, slice.call(arguments, 1));
  };

  // Produce a duplicate-free version of the array. If the array has already
  // been sorted, you have the option of using a faster algorithm.
  // Aliased as `unique`.
  _.uniq = _.unique = function(array, isSorted, iterator) {
    var initial = iterator ? _.map(array, iterator) : array;
    var results = [];
    // The `isSorted` flag is irrelevant if the array only contains two elements.
    if (array.length < 3) isSorted = true;
    _.reduce(initial, function (memo, value, index) {
      if (isSorted ? _.last(memo) !== value || !memo.length : !_.include(memo, value)) {
        memo.push(value);
        results.push(array[index]);
      }
      return memo;
    }, []);
    return results;
  };

  // Produce an array that contains the union: each distinct element from all of
  // the passed-in arrays.
  _.union = function() {
    return _.uniq(_.flatten(arguments, true));
  };

  // Produce an array that contains every item shared between all the
  // passed-in arrays. (Aliased as "intersect" for back-compat.)
  _.intersection = _.intersect = function(array) {
    var rest = slice.call(arguments, 1);
    return _.filter(_.uniq(array), function(item) {
      return _.every(rest, function(other) {
        return _.indexOf(other, item) >= 0;
      });
    });
  };

  // Take the difference between one array and a number of other arrays.
  // Only the elements present in just the first array will remain.
  _.difference = function(array) {
    var rest = _.flatten(slice.call(arguments, 1), true);
    return _.filter(array, function(value){ return !_.include(rest, value); });
  };

  // Zip together multiple lists into a single array -- elements that share
  // an index go together.
  _.zip = function() {
    var args = slice.call(arguments);
    var length = _.max(_.pluck(args, 'length'));
    var results = new Array(length);
    for (var i = 0; i < length; i++) results[i] = _.pluck(args, "" + i);
    return results;
  };

  // If the browser doesn't supply us with indexOf (I'm looking at you, **MSIE**),
  // we need this function. Return the position of the first occurrence of an
  // item in an array, or -1 if the item is not included in the array.
  // Delegates to **ECMAScript 5**'s native `indexOf` if available.
  // If the array is large and already in sort order, pass `true`
  // for **isSorted** to use binary search.
  _.indexOf = function(array, item, isSorted) {
    if (array == null) return -1;
    var i, l;
    if (isSorted) {
      i = _.sortedIndex(array, item);
      return array[i] === item ? i : -1;
    }
    if (nativeIndexOf && array.indexOf === nativeIndexOf) return array.indexOf(item);
    for (i = 0, l = array.length; i < l; i++) if (i in array && array[i] === item) return i;
    return -1;
  };

  // Delegates to **ECMAScript 5**'s native `lastIndexOf` if available.
  _.lastIndexOf = function(array, item) {
    if (array == null) return -1;
    if (nativeLastIndexOf && array.lastIndexOf === nativeLastIndexOf) return array.lastIndexOf(item);
    var i = array.length;
    while (i--) if (i in array && array[i] === item) return i;
    return -1;
  };

  // Generate an integer Array containing an arithmetic progression. A port of
  // the native Python `range()` function. See
  // [the Python documentation](http://docs.python.org/library/functions.html#range).
  _.range = function(start, stop, step) {
    if (arguments.length <= 1) {
      stop = start || 0;
      start = 0;
    }
    step = arguments[2] || 1;

    var len = Math.max(Math.ceil((stop - start) / step), 0);
    var idx = 0;
    var range = new Array(len);

    while(idx < len) {
      range[idx++] = start;
      start += step;
    }

    return range;
  };

  // Function (ahem) Functions
  // ------------------

  // Reusable constructor function for prototype setting.
  var ctor = function(){};

  // Create a function bound to a given object (assigning `this`, and arguments,
  // optionally). Binding with arguments is also known as `curry`.
  // Delegates to **ECMAScript 5**'s native `Function.bind` if available.
  // We check for `func.bind` first, to fail fast when `func` is undefined.
  _.bind = function bind(func, context) {
    var bound, args;
    if (func.bind === nativeBind && nativeBind) return nativeBind.apply(func, slice.call(arguments, 1));
    if (!_.isFunction(func)) throw new TypeError;
    args = slice.call(arguments, 2);
    return bound = function() {
      if (!(this instanceof bound)) return func.apply(context, args.concat(slice.call(arguments)));
      ctor.prototype = func.prototype;
      var self = new ctor;
      var result = func.apply(self, args.concat(slice.call(arguments)));
      if (Object(result) === result) return result;
      return self;
    };
  };

  // Bind all of an object's methods to that object. Useful for ensuring that
  // all callbacks defined on an object belong to it.
  _.bindAll = function(obj) {
    var funcs = slice.call(arguments, 1);
    if (funcs.length == 0) funcs = _.functions(obj);
    each(funcs, function(f) { obj[f] = _.bind(obj[f], obj); });
    return obj;
  };

  // Memoize an expensive function by storing its results.
  _.memoize = function(func, hasher) {
    var memo = {};
    hasher || (hasher = _.identity);
    return function() {
      var key = hasher.apply(this, arguments);
      return _.has(memo, key) ? memo[key] : (memo[key] = func.apply(this, arguments));
    };
  };

  // Delays a function for the given number of milliseconds, and then calls
  // it with the arguments supplied.
  _.delay = function(func, wait) {
    var args = slice.call(arguments, 2);
    return setTimeout(function(){ return func.apply(null, args); }, wait);
  };

  // Defers a function, scheduling it to run after the current call stack has
  // cleared.
  _.defer = function(func) {
    return _.delay.apply(_, [func, 1].concat(slice.call(arguments, 1)));
  };

  // Returns a function, that, when invoked, will only be triggered at most once
  // during a given window of time.
  _.throttle = function(func, wait) {
    var context, args, timeout, throttling, more, result;
    var whenDone = _.debounce(function(){ more = throttling = false; }, wait);
    return function() {
      context = this; args = arguments;
      var later = function() {
        timeout = null;
        if (more) func.apply(context, args);
        whenDone();
      };
      if (!timeout) timeout = setTimeout(later, wait);
      if (throttling) {
        more = true;
      } else {
        result = func.apply(context, args);
      }
      whenDone();
      throttling = true;
      return result;
    };
  };

  // Returns a function, that, as long as it continues to be invoked, will not
  // be triggered. The function will be called after it stops being called for
  // N milliseconds. If `immediate` is passed, trigger the function on the
  // leading edge, instead of the trailing.
  _.debounce = function(func, wait, immediate) {
    var timeout;
    return function() {
      var context = this, args = arguments;
      var later = function() {
        timeout = null;
        if (!immediate) func.apply(context, args);
      };
      if (immediate && !timeout) func.apply(context, args);
      clearTimeout(timeout);
      timeout = setTimeout(later, wait);
    };
  };

  // Returns a function that will be executed at most one time, no matter how
  // often you call it. Useful for lazy initialization.
  _.once = function(func) {
    var ran = false, memo;
    return function() {
      if (ran) return memo;
      ran = true;
      return memo = func.apply(this, arguments);
    };
  };

  // Returns the first function passed as an argument to the second,
  // allowing you to adjust arguments, run code before and after, and
  // conditionally execute the original function.
  _.wrap = function(func, wrapper) {
    return function() {
      var args = [func].concat(slice.call(arguments, 0));
      return wrapper.apply(this, args);
    };
  };

  // Returns a function that is the composition of a list of functions, each
  // consuming the return value of the function that follows.
  _.compose = function() {
    var funcs = arguments;
    return function() {
      var args = arguments;
      for (var i = funcs.length - 1; i >= 0; i--) {
        args = [funcs[i].apply(this, args)];
      }
      return args[0];
    };
  };

  // Returns a function that will only be executed after being called N times.
  _.after = function(times, func) {
    if (times <= 0) return func();
    return function() {
      if (--times < 1) { return func.apply(this, arguments); }
    };
  };

  // Object Functions
  // ----------------

  // Retrieve the names of an object's properties.
  // Delegates to **ECMAScript 5**'s native `Object.keys`
  _.keys = nativeKeys || function(obj) {
    if (obj !== Object(obj)) throw new TypeError('Invalid object');
    var keys = [];
    for (var key in obj) if (_.has(obj, key)) keys[keys.length] = key;
    return keys;
  };

  // Retrieve the values of an object's properties.
  _.values = function(obj) {
    return _.map(obj, _.identity);
  };

  // Return a sorted list of the function names available on the object.
  // Aliased as `methods`
  _.functions = _.methods = function(obj) {
    var names = [];
    for (var key in obj) {
      if (_.isFunction(obj[key])) names.push(key);
    }
    return names.sort();
  };

  // Extend a given object with all the properties in passed-in object(s).
  _.extend = function(obj) {
    each(slice.call(arguments, 1), function(source) {
      for (var prop in source) {
        obj[prop] = source[prop];
      }
    });
    return obj;
  };

  // Return a copy of the object only containing the whitelisted properties.
  _.pick = function(obj) {
    var result = {};
    each(_.flatten(slice.call(arguments, 1)), function(key) {
      if (key in obj) result[key] = obj[key];
    });
    return result;
  };

  // Fill in a given object with default properties.
  _.defaults = function(obj) {
    each(slice.call(arguments, 1), function(source) {
      for (var prop in source) {
        if (obj[prop] == null) obj[prop] = source[prop];
      }
    });
    return obj;
  };

  // Create a (shallow-cloned) duplicate of an object.
  _.clone = function(obj) {
    if (!_.isObject(obj)) return obj;
    return _.isArray(obj) ? obj.slice() : _.extend({}, obj);
  };

  // Invokes interceptor with the obj, and then returns obj.
  // The primary purpose of this method is to "tap into" a method chain, in
  // order to perform operations on intermediate results within the chain.
  _.tap = function(obj, interceptor) {
    interceptor(obj);
    return obj;
  };

  // Internal recursive comparison function.
  function eq(a, b, stack) {
    // Identical objects are equal. `0 === -0`, but they aren't identical.
    // See the Harmony `egal` proposal: http://wiki.ecmascript.org/doku.php?id=harmony:egal.
    if (a === b) return a !== 0 || 1 / a == 1 / b;
    // A strict comparison is necessary because `null == undefined`.
    if (a == null || b == null) return a === b;
    // Unwrap any wrapped objects.
    if (a._chain) a = a._wrapped;
    if (b._chain) b = b._wrapped;
    // Invoke a custom `isEqual` method if one is provided.
    if (a.isEqual && _.isFunction(a.isEqual)) return a.isEqual(b);
    if (b.isEqual && _.isFunction(b.isEqual)) return b.isEqual(a);
    // Compare `[[Class]]` names.
    var className = toString.call(a);
    if (className != toString.call(b)) return false;
    switch (className) {
      // Strings, numbers, dates, and booleans are compared by value.
      case '[object String]':
        // Primitives and their corresponding object wrappers are equivalent; thus, `"5"` is
        // equivalent to `new String("5")`.
        return a == String(b);
      case '[object Number]':
        // `NaN`s are equivalent, but non-reflexive. An `egal` comparison is performed for
        // other numeric values.
        return a != +a ? b != +b : (a == 0 ? 1 / a == 1 / b : a == +b);
      case '[object Date]':
      case '[object Boolean]':
        // Coerce dates and booleans to numeric primitive values. Dates are compared by their
        // millisecond representations. Note that invalid dates with millisecond representations
        // of `NaN` are not equivalent.
        return +a == +b;
      // RegExps are compared by their source patterns and flags.
      case '[object RegExp]':
        return a.source == b.source &&
               a.global == b.global &&
               a.multiline == b.multiline &&
               a.ignoreCase == b.ignoreCase;
    }
    if (typeof a != 'object' || typeof b != 'object') return false;
    // Assume equality for cyclic structures. The algorithm for detecting cyclic
    // structures is adapted from ES 5.1 section 15.12.3, abstract operation `JO`.
    var length = stack.length;
    while (length--) {
      // Linear search. Performance is inversely proportional to the number of
      // unique nested structures.
      if (stack[length] == a) return true;
    }
    // Add the first object to the stack of traversed objects.
    stack.push(a);
    var size = 0, result = true;
    // Recursively compare objects and arrays.
    if (className == '[object Array]') {
      // Compare array lengths to determine if a deep comparison is necessary.
      size = a.length;
      result = size == b.length;
      if (result) {
        // Deep compare the contents, ignoring non-numeric properties.
        while (size--) {
          // Ensure commutative equality for sparse arrays.
          if (!(result = size in a == size in b && eq(a[size], b[size], stack))) break;
        }
      }
    } else {
      // Objects with different constructors are not equivalent.
      if ('constructor' in a != 'constructor' in b || a.constructor != b.constructor) return false;
      // Deep compare objects.
      for (var key in a) {
        if (_.has(a, key)) {
          // Count the expected number of properties.
          size++;
          // Deep compare each member.
          if (!(result = _.has(b, key) && eq(a[key], b[key], stack))) break;
        }
      }
      // Ensure that both objects contain the same number of properties.
      if (result) {
        for (key in b) {
          if (_.has(b, key) && !(size--)) break;
        }
        result = !size;
      }
    }
    // Remove the first object from the stack of traversed objects.
    stack.pop();
    return result;
  }

  // Perform a deep comparison to check if two objects are equal.
  _.isEqual = function(a, b) {
    return eq(a, b, []);
  };

  // Is a given array, string, or object empty?
  // An "empty" object has no enumerable own-properties.
  _.isEmpty = function(obj) {
    if (obj == null) return true;
    if (_.isArray(obj) || _.isString(obj)) return obj.length === 0;
    for (var key in obj) if (_.has(obj, key)) return false;
    return true;
  };

  // Is a given value a DOM element?
  _.isElement = function(obj) {
    return !!(obj && obj.nodeType == 1);
  };

  // Is a given value an array?
  // Delegates to ECMA5's native Array.isArray
  _.isArray = nativeIsArray || function(obj) {
    return toString.call(obj) == '[object Array]';
  };

  // Is a given variable an object?
  _.isObject = function(obj) {
    return obj === Object(obj);
  };

  // Is a given variable an arguments object?
  _.isArguments = function(obj) {
    return toString.call(obj) == '[object Arguments]';
  };
  if (!_.isArguments(arguments)) {
    _.isArguments = function(obj) {
      return !!(obj && _.has(obj, 'callee'));
    };
  }

  // Is a given value a function?
  _.isFunction = function(obj) {
    return toString.call(obj) == '[object Function]';
  };

  // Is a given value a string?
  _.isString = function(obj) {
    return toString.call(obj) == '[object String]';
  };

  // Is a given value a number?
  _.isNumber = function(obj) {
    return toString.call(obj) == '[object Number]';
  };

  // Is a given object a finite number?
  _.isFinite = function(obj) {
    return _.isNumber(obj) && isFinite(obj);
  };

  // Is the given value `NaN`?
  _.isNaN = function(obj) {
    // `NaN` is the only value for which `===` is not reflexive.
    return obj !== obj;
  };

  // Is a given value a boolean?
  _.isBoolean = function(obj) {
    return obj === true || obj === false || toString.call(obj) == '[object Boolean]';
  };

  // Is a given value a date?
  _.isDate = function(obj) {
    return toString.call(obj) == '[object Date]';
  };

  // Is the given value a regular expression?
  _.isRegExp = function(obj) {
    return toString.call(obj) == '[object RegExp]';
  };

  // Is a given value equal to null?
  _.isNull = function(obj) {
    return obj === null;
  };

  // Is a given variable undefined?
  _.isUndefined = function(obj) {
    return obj === void 0;
  };

  // Has own property?
  _.has = function(obj, key) {
    return hasOwnProperty.call(obj, key);
  };

  // Utility Functions
  // -----------------

  // Run Underscore.js in *noConflict* mode, returning the `_` variable to its
  // previous owner. Returns a reference to the Underscore object.
  _.noConflict = function() {
    root._ = previousUnderscore;
    return this;
  };

  // Keep the identity function around for default iterators.
  _.identity = function(value) {
    return value;
  };

  // Run a function **n** times.
  _.times = function (n, iterator, context) {
    for (var i = 0; i < n; i++) iterator.call(context, i);
  };

  // Escape a string for HTML interpolation.
  _.escape = function(string) {
    return (''+string).replace(/&/g, '&amp;').replace(/</g, '&lt;').replace(/>/g, '&gt;').replace(/"/g, '&quot;').replace(/'/g, '&#x27;').replace(/\//g,'&#x2F;');
  };

  // If the value of the named property is a function then invoke it;
  // otherwise, return it.
  _.result = function(object, property) {
    if (object == null) return null;
    var value = object[property];
    return _.isFunction(value) ? value.call(object) : value;
  };

  // Add your own custom functions to the Underscore object, ensuring that
  // they're correctly added to the OOP wrapper as well.
  _.mixin = function(obj) {
    each(_.functions(obj), function(name){
      addToWrapper(name, _[name] = obj[name]);
    });
  };

  // Generate a unique integer id (unique within the entire client session).
  // Useful for temporary DOM ids.
  var idCounter = 0;
  _.uniqueId = function(prefix) {
    var id = idCounter++;
    return prefix ? prefix + id : id;
  };

  // By default, Underscore uses ERB-style template delimiters, change the
  // following template settings to use alternative delimiters.
  _.templateSettings = {
    evaluate    : /<%([\s\S]+?)%>/g,
    interpolate : /<%=([\s\S]+?)%>/g,
    escape      : /<%-([\s\S]+?)%>/g
  };

  // When customizing `templateSettings`, if you don't want to define an
  // interpolation, evaluation or escaping regex, we need one that is
  // guaranteed not to match.
  var noMatch = /.^/;

  // Certain characters need to be escaped so that they can be put into a
  // string literal.
  var escapes = {
    '\\': '\\',
    "'": "'",
    'r': '\r',
    'n': '\n',
    't': '\t',
    'u2028': '\u2028',
    'u2029': '\u2029'
  };

  for (var p in escapes) escapes[escapes[p]] = p;
  var escaper = /\\|'|\r|\n|\t|\u2028|\u2029/g;
  var unescaper = /\\(\\|'|r|n|t|u2028|u2029)/g;

  // Within an interpolation, evaluation, or escaping, remove HTML escaping
  // that had been previously added.
  var unescape = function(code) {
    return code.replace(unescaper, function(match, escape) {
      return escapes[escape];
    });
  };

  // JavaScript micro-templating, similar to John Resig's implementation.
  // Underscore templating handles arbitrary delimiters, preserves whitespace,
  // and correctly escapes quotes within interpolated code.
  _.template = function(text, data, settings) {
    settings = _.defaults(settings || {}, _.templateSettings);

    // Compile the template source, taking care to escape characters that
    // cannot be included in a string literal and then unescape them in code
    // blocks.
    var source = "__p+='" + text
      .replace(escaper, function(match) {
        return '\\' + escapes[match];
      })
      .replace(settings.escape || noMatch, function(match, code) {
        return "'+\n_.escape(" + unescape(code) + ")+\n'";
      })
      .replace(settings.interpolate || noMatch, function(match, code) {
        return "'+\n(" + unescape(code) + ")+\n'";
      })
      .replace(settings.evaluate || noMatch, function(match, code) {
        return "';\n" + unescape(code) + "\n;__p+='";
      }) + "';\n";

    // If a variable is not specified, place data values in local scope.
    if (!settings.variable) source = 'with(obj||{}){\n' + source + '}\n';

    source = "var __p='';" +
      "var print=function(){__p+=Array.prototype.join.call(arguments, '')};\n" +
      source + "return __p;\n";

    var render = new Function(settings.variable || 'obj', '_', source);
    if (data) return render(data, _);
    var template = function(data) {
      return render.call(this, data, _);
    };

    // Provide the compiled function source as a convenience for build time
    // precompilation.
    template.source = 'function(' + (settings.variable || 'obj') + '){\n' +
      source + '}';

    return template;
  };

  // Add a "chain" function, which will delegate to the wrapper.
  _.chain = function(obj) {
    return _(obj).chain();
  };

  // The OOP Wrapper
  // ---------------

  // If Underscore is called as a function, it returns a wrapped object that
  // can be used OO-style. This wrapper holds altered versions of all the
  // underscore functions. Wrapped objects may be chained.
  var wrapper = function(obj) { this._wrapped = obj; };

  // Expose `wrapper.prototype` as `_.prototype`
  _.prototype = wrapper.prototype;

  // Helper function to continue chaining intermediate results.
  var result = function(obj, chain) {
    return chain ? _(obj).chain() : obj;
  };

  // A method to easily add functions to the OOP wrapper.
  var addToWrapper = function(name, func) {
    wrapper.prototype[name] = function() {
      var args = slice.call(arguments);
      unshift.call(args, this._wrapped);
      return result(func.apply(_, args), this._chain);
    };
  };

  // Add all of the Underscore functions to the wrapper object.
  _.mixin(_);

  // Add all mutator Array functions to the wrapper.
  each(['pop', 'push', 'reverse', 'shift', 'sort', 'splice', 'unshift'], function(name) {
    var method = ArrayProto[name];
    wrapper.prototype[name] = function() {
      var wrapped = this._wrapped;
      method.apply(wrapped, arguments);
      var length = wrapped.length;
      if ((name == 'shift' || name == 'splice') && length === 0) delete wrapped[0];
      return result(wrapped, this._chain);
    };
  });

  // Add all accessor Array functions to the wrapper.
  each(['concat', 'join', 'slice'], function(name) {
    var method = ArrayProto[name];
    wrapper.prototype[name] = function() {
      return result(method.apply(this._wrapped, arguments), this._chain);
    };
  });

  // Start chaining a wrapped Underscore object.
  wrapper.prototype.chain = function() {
    this._chain = true;
    return this;
  };

  // Extracts the result from a wrapped and chained object.
  wrapper.prototype.value = function() {
    return this._wrapped;
  };

}).call(this);
(function (window, Shopatron) {
	// Remove underscore from the global scope
	var jQuery = Shopatron, _ = window._.noConflict(), JST;
	
	// Register the JST Version
	Shopatron.setJSTVersion("2.3.1");

	(function ($, undefined) {
	'use strict';

	/**
	 * Serializes a form into an object.  If array notation is used (eg. example[one][two]), then a multi-dimentional
	 * array is created.
	 *
	 * @return The serialized data
	 */
	$.fn.serializeForm = function () {
		var data = {};

		function keyParser(elementName) {
			// If the key is not valid array notation, don't attempt to split it
			var keyParts = elementName.match(/\][^\[$]|[^\]]$|^\[|^[^\[]*\]|\[[^\]]*\[/) ? [elementName] : elementName.split(/(?=\[)/);

			keyParts.shift = function (obj) {
				var key = [].shift.apply(keyParts).replace(/[\[\]]/g, '');

				// If the key uses [] notation, determine the next available integer to use as the key
				if (key === '') {
					key = parseInt(Object.keys(obj).filter(function (elementValue) {
						return !isNaN(parseInt(elementValue, 10));
					}).sort().pop(), 10) + 1 || 0;
				}

				return key;
			};

			return keyParts;
		}

		// jQuery gets us name/value pairs but we have to parse them into an object
		$.each(this.serializeArray(), function (ndx, element) {
			var dataPointer, keys, key;

			dataPointer = data;
			keys = keyParser(element.name);
			key = keys.shift(dataPointer);

			while (keys.length > 0) {
				// Initialize the key
				if (dataPointer[key] === undefined) {
					dataPointer[key] = {};
				}

				// Advance the pointer
				dataPointer = dataPointer[key];

				// Get the next key in the chain
				key = keys.shift(dataPointer);
			}

			// Set key value
			dataPointer[key] = element.value;
		});//end of jQuery.each call

		return data;
	};
}(jQuery));
	// Load language data
	(function ($) {
		var languageData = {
			'en-US': {messages: {"addToCart":"Add To Cart","emptyCart":"There are no items in your cart.","product":"Product","partNumber":"Part \\#","quantity":"Quantity","price":"Price","total":"Items Total","shippingAndHandling":"Shipping and Handling","checkout":"Checkout","updateQuantity":"Update Quantity","remove":"Remove","shoppingCart":"Shopping Cart","cartSummary":"{numItems, plural, one{# Item} other{# Items}}, {subtotal}","prompt":"Choose a {optionName}","missingOption":"You must select a {optionName} option."}},
			'en-CA': {fallback: 'en-US', messages: []},
			'fr-CA': {fallback: 'fr-FR', messages: {"addToCart":"Ajouter au panier","emptyCart":"Aucun article dans le panier","product":"Produit","partNumber":"Num\u00e9ro de pi\u00e8ce","quantity":"Quantit\u00e9","price":"Prix","total":"Total","shippingAndHandling":"Estimation exp\u00e9dition et traitement","checkout":"Caisse","updateQuantity":"Mise \u00e0 jour Quantit\u00e9","remove":"Supprimer","shoppingCart":"Panier","cartSummary":"{numItems, plural, one{# \u00e9l\u00e9ment} other{# \u00e9l\u00e9ments}}, {subtotal}","prompt":"Choisissez une {optionName}","missingOption":"Vous devez s\u00e9lectionner une option de {optionName}."}},
			'en-GB': {fallback: 'en-US', messages: {"addToCart":"Add To Cart","emptyCart":"There are no items in your cart.","product":"Product","partNumber":"Part \\#","quantity":"Quantity","price":"Price","total":"Items Total","shippingAndHandling":"Shipping and Handling","checkout":"Checkout","updateQuantity":"Update Quantity","remove":"Remove","shoppingCart":"Shopping Cart","cartSummary":"{numItems, plural, one{# Item} other{# Items}}, {subtotal}","prompt":"Choose a {optionName}","missingOption":"You must select a {optionName} option."}},
			'de-DE': {messages: {"addToCart":"In den Warenkorb","emptyCart":"Keine Artikel im Warenkorb","product":"Produkt","partNumber":"Teilenummer","quantity":"Menge","price":"Preis","total":"Gesamt","shippingAndHandling":"Gesch\u00e4tzte Versandkosten","checkout":"Kasse","updateQuantity":"Aktualisieren Menge","remove":"Entfernen","shoppingCart":"Warenkorb","cartSummary":"{numItems} Artikel, {subtotal}","prompt":"W\u00e4hlen Sie eine {optionName}","missingOption":"Sie m\u00fcssen w\u00e4hlen Sie eine {optionName} Option."}},
			'fr-FR': {messages: {"addToCart":"Ajouter au panier","emptyCart":"Aucun article dans le panier","product":"Produit","partNumber":"Num\u00e9ro de pi\u00e8ce","quantity":"Quantit\u00e9","price":"Prix","total":"Total","shippingAndHandling":"Estimation exp\u00e9dition et traitement","checkout":"Caisse","updateQuantity":"Mise \u00e0 jour Quantit\u00e9","remove":"Supprimer","shoppingCart":"Panier","cartSummary":"{numItems, plural, one{# \u00e9l\u00e9ment} other{# \u00e9l\u00e9ments}}, {subtotal}","prompt":"Choisissez une {optionName}","missingOption":"Vous devez s\u00e9lectionner une option de {optionName}."}},
			'it-IT': {messages: {"addToCart":"Aggiungi al carrello","emptyCart":"Nessun articolo nel carrello.","product":"Prodotto","partNumber":"Numero componente","quantity":"Quantit\u00e0","price":"Prezzo","total":"Totale","shippingAndHandling":"Spedizione stimata e la manipolazione","checkout":"Cassa","updateQuantity":"Aggiornamento Quantit\u00e0","remove":"Rimuovi","shoppingCart":"Carrello","cartSummary":"{numItems, plural, one{# articolo} other{# articoli}}, {subtotal}","prompt":"Scegli un {optionName}","missingOption":"\u00c8 Deve selezionare un {optionName} opzione."}}
		};

		$.each(languageData, function (locale, data) {
			var fallbackLocale = languageData[data.fallback] || {};
			Shopatron.i18n.setLocale(locale);
			Shopatron.i18n.loadTranslations($.extend(fallbackLocale.messages, data.messages));
		});
	}(jQuery));

	JST = {
		addToCartButton: _.template("<form method=\"POST\" action=\"javascript:void(0)\" class=\"shopatron_content\">\n\t<div id=\"shptrn_addToCart\">\n\t\t<!-- product data -->\n\t\t<% if (data.catalogID) { %>\n\t\t<input type=\"hidden\" name=\"catalogID\" value=\"<%- data.catalogID %>\" \/>\n\t\t<% } %>\n\t\t<input type=\"hidden\" name=\"partNumber\" value=\"<%- data.partNumber %>\" \/>\n\t\t<input type=\"hidden\" name=\"productLink\" value=\"<%- data.productLink || window.location.href %>\" \/>\n\n\t\t<% if (data.productOptions.length > 0) { %>\n\t\t<!-- product option data -->\n\t\t<div class=\"shptrn_product_option_container\">\n\t\t\t<% _.each (data.productOptions, function (group) { %>\n\t\t\t<!-- product option: <%- group.displayName %> -->\n\t\t\t<div class=\"shptrn_product_option\">\n\t\t\t\t<label for=\"itemOptions_<%- group.name %>\"><%- group.displayName %>:<\/label>\n\t\t\t\t<% var currTextOption = group.optionChoices.options[0].textOption;%>\n\t\t\t\t<% if (currTextOption !== undefined) { %>\n\t\t\t\t\t<% var minLength = currTextOption.minLength ? currTextOption.minLength : 0; %>\n\t\t\t\t\t<% var maxLength = currTextOption.maxLength ? currTextOption.maxLength : \"\"; %>\n\n\t\t\t\t\t<input\n\t\t\t\t\t\ttype=\"text\"\n\t\t\t\t\t\tid=\"itemOptions_<%- group.name %>\"\n\t\t\t\t\t\tname=\"itemOptions[<%- group.name %>]\"\n\t\t\t\t\t\tclass=\"optn optn_<%- group.optionChoices.options[0].name %>\"\n\t\t\t\t\t\t<% if (minLength !== 0 || maxLength !== \"\") { %>\n\t\t\t\t\t\tpattern=\".{<%= minLength %>,<%= maxLength %>}\"\n\t\t\t\t\t\ttitle=\"<% minLength !== 0 ? print(\"Minimum (\" + minLength + \") characters; \" ) : \"\" %><% maxLength !== \"\" ? print(\"Maximum (\" + maxLength + \") characters\" ) : \"\" %>\"\n\t\t\t\t\t\t<% }%>\n\t\t\t\t\t>\n\t\t\t\t<% } else { %>\n\t\t\t\t\t<select id=\"itemOptions_<%- group.name %>\" name=\"itemOptions[<%- group.name %>]\" class=\"optn\">\n\t\t\t\t\t\t<% if (data.showPrompt === true) { %>\n\t\t\t\t\t\t<option class=\"shptrn_prompt\" value=\"\"><%- data.messages.prompt({optionName: group.displayName}) %><\/option>\n\t\t\t\t\t\t<% } %>\n\t\t\t\t\t\t<% _.each(group.optionChoices.options, function (option) { %>\n\t\t\t\t\t\t<option value=\"<%- option.name %>\">\n\t\t\t\t\t\t\t<%- option.displayName %>\n\t\t\t\t\t\t\t<% if (option.additionalPrice > 0) { %>\n\t\t\t\t\t\t\t(+<%- option.additionalPriceDisplay %>)\n\t\t\t\t\t\t\t<% } %>\n\t\t\t\t\t\t<\/option>\n\t\t\t\t\t\t<% }); %>\n\t\t\t\t\t<\/select>\n\t\t\t\t<% } %>\n\t\t\t<\/div><!-- end shptrn product option -->\n\t\t\t<% }); %>\n\t\t<\/div><!-- end shptrn product option container -->\n\t\t<% } %>\n\n\t\t<!-- quantity selector -->\n\t\t<div class=\"shptrn_quantity\">\n\t\t\t<label for=\"quantity\"><%- data.messages.quantity() %>:<\/label>\n\t\t\t<input type=\"text\" id=\"quantity\" name=\"quantity\" class=\"shptrn_quantity_selector\" value=\"1\">\n\t\t\t<!-- add to cart button -->\n\t\t\t<div class=\"shptrn_atc_button\">\n\t\t\t\t<button type=\"submit\" class=\"shptrn_button\"><%- data.messages.addToCart() %><\/button>\n\t\t\t<\/div><!-- end shptrn atc button -->\n\t\t<\/div><!-- end shptrn quantity -->\n\n\t<\/div><!-- end shptrn addToCart -->\n<\/form>\n", null, {variable: 'data'}),
		quickCart: _.template("<div class=\"shopatron_quick_cart shopatron_content\">\n\t<span class=\"shptrn_quick_cart\">\n\t\t<% if (data.cartLink) { %><a href=\"<%- data.cartLink %>\"><% } %>\n\t\t<span class=\"shptrn_quick_label\"><%- data.messages.shoppingCart() %>:<\/span>\n\t\t<span class=\"shptrn_quick_data\"><%- data.messages.cartSummary({numItems: data.cart.cartItems.length, subtotal: data.cart.subtotalDisplay}) %><\/span>\n\t\t<% if (data.cartLink) { %><\/a><% } %>\n\t<\/span><!-- end shptrn_quick_cart -->\n<\/div><!-- end shopatron quick cart -->\n", null, {variable: 'data'}),
		cart: _.template("<div id=\"shopatron_cart_container\" class=\"shopatron_content\">\n\t<% if (data.cart.cartItems.length === 0) { %>\n\t<div class=\"shptrn_no_items_in_cart\"><%- data.messages.emptyCart() %><\/div>\n\t<% } else { %>\n\t<div id=\"shptrn_cart_items\">\n\t\t<div id=\"shptrn_cart_items_header\">\n\t\t\t<label id=\"shptrn_ch_item\"><%- data.messages.product() %><\/label>\n\t\t\t<label id=\"shptrn_ch_part_num\"><%- data.messages.partNumber() %><\/label>\n\t\t\t<label id=\"shptrn_ch_item_qty\"><%- data.messages.quantity() %><\/label>\n\t\t\t<label id=\"shptrn_ch_item_price\"><%- data.messages.price() %><\/label>\n\t\t<\/div><!-- end shptrn cart items header -->\n\t\t<% _.each(data.cart.cartItems, function (cartItem) { %>\n\t\t<div id=\"cartItem_<%- cartItem.cartItemID %>\" class=\"shptrn_cart_item\">\n\t\t<table><!-- start cart item -->\n\t\t\t<tr>\n\t\t\t\t<td class=\"shptrn_ci_image\">\n\t\t\t\t\t<table>\n\t\t\t\t\t\t<tr>\n\t\t\t\t\t\t\t<td>\n\t\t\t\t\t\t\t\t<% if (cartItem.image) { %>\n\t\t\t\t\t\t\t\t<a href=\"<%- cartItem.productLink %>\"><img src=\"<%- cartItem.image %>?w=<%- cartItem.imageWidth %>&h=<%- cartItem.imageHeight%>\" \/><\/a>\n\t\t\t\t\t\t\t\t<% } %>\n\t\t\t\t\t\t\t<\/td>\n\t\t\t\t\t\t<\/tr>\n\t\t\t\t\t<\/table>\n\t\t\t\t<\/td><!-- end cart item image -->\n\t\t\t\t<td class=\"shptrn_ci_details\">\n\t\t\t\t\t<h3><a href=\"<%- cartItem.productLink %>\"><%- cartItem.product.name %><\/a><\/h3>\n\t\t\t\t\t<% if (cartItem.itemOptions.length > 0) { %>\n\t\t\t\t\t<ul>\n\t\t\t\t\t\t<% _.each(cartItem.itemOptions, function (option) { %>\n\t\t\t\t\t\t<li><strong><%- option.name %>:<\/strong> <%- option.value %><\/li>\n\t\t\t\t\t\t<% }); %>\n\t\t\t\t\t<\/ul>\n\t\t\t\t\t<% } %>\n\t\t\t\t<\/td><!-- end cart item details -->\n\t\t\t\t<td class=\"shptrn_ci_part_num\">\n\t\t\t\t\t<%- cartItem.product.partNumber %>\n\t\t\t\t<\/td><!-- end cart item part number -->\n\t\t\t\t<td class=\"shptrn_ci_qty\">\n\t\t\t\t\t<input type=\"text\" value=\"<%- cartItem.quantity %>\" name=\"quant_<%- cartItem.cartItemID %>\" id=\"quant_<%- cartItem.cartItemID %>\">\n\t\t\t\t\t<button type=\"button\" id=\"update_quantity_<%- cartItem.cartItemID %>\" class=\"shptrn_button\"><%- data.messages.updateQuantity() %><\/button>\n\t\t\t\t\t<button type=\"button\" id=\"remove_item_<%- cartItem.cartItemID %>\" class=\"shptrn_button\"><%- data.messages.remove() %><\/button>\n\t\t\t\t<\/td><!-- end cart item quantity -->\n\t\t\t\t<td class=\"shptrn_ci_price\">\n\t\t\t\t\t<%- cartItem.priceDisplay %>\n\t\t\t\t<\/td><!-- end cart item price -->\n\t\t\t<\/tr>\n\t\t<\/table><!-- end cart item -->\n\t\t<\/div>\n\t\t<% }); %>\n\t<\/div><!-- end shptrn cart items -->\n\n\t<div id=\"shptrn_checkout_detail_row\">\n\t\t<div id=\"shptrn_checkout_detail_content\">\n\t\t\t<div class=\"shptrn_cart_price_row total\">\n\t\t\t\t<span class=\"left\"><%- data.messages.total() %>:<\/span>\n\t\t\t\t<span class=\"right\"><%- data.cart.subtotalDisplay %><\/span>\n\t\t\t<\/div><!-- end shptrn cart total row -->\n\t\t\t<% if (data.cart.shippingTotalDisplay) { %>\n\t\t\t<div class=\"shptrn_cart_price_row shipping\">\n\t\t\t\t<span class=\"left\"><%- data.messages.shippingAndHandling() %>:<\/span>\n\t\t\t\t<span class=\"right\"><%- data.cart.shippingTotalDisplay %><\/span>\n\t\t\t<\/div><!-- end shptrn cart total row -->\n\t\t\t<% } %>\n\t\t\t<div class=\"shptrn_cart_price_row checkout\">\n\t\t\t\t<div class=\"shptrn_checkout_button\">\n\t\t\t\t\t<button type=\"button\" class=\"shptrn_button\"><%- data.messages.checkout() %><\/button>\n\t\t\t\t<\/div>\n\t\t\t<\/div><!-- end shptrn cart total row -->\n\t\t<\/div><!-- end shptrn checkout detail content -->\n\t<\/div><!-- end shptrn checkout detail row -->\n\t<% } %>\n<\/div><!-- end shopatron cart container -->\n", null, {variable: 'data'})
	};

	(function (window, $, Shopatron, JST, undefined) {
	'use strict';

	var refreshCart, autoRefreshQueue = [];

	// Find custom tags on the page and parse the data to make the necessary function call
	$(function () {
		// Helper function getAttributes
		var getAttributes = function (element) {
			var requestData = {}, options = {}, i, attrName, toUpper;

			toUpper = function (str, match) {
				return match.toUpperCase();
			};

			for (i = 0; i < element.attributes.length; i++) {
				attrName = element.attributes[i].name.replace(/_(.)/, toUpper);
				if ($.inArray(attrName, ['onsuccess', 'onerror', 'oncomplete', 'onclickSuccess', 'onclickError', 'onclickComplete']) >= 0) {
					// Remove the 'on' from the success, error, and complete variables
					options[attrName.substr(0, 2) === 'on' ? attrName.substr(2) : attrName] = new Function(element.attributes[i].value);
				}
				requestData[attrName] = element.attributes[i].value;
			}

			return {
				requestData: requestData,
				options: options
			};
		};

		// Initialize Add to Cart Button
		$('*').filter(function () { return this.nodeName === 'TRON:ATCBUTTON'; }).each(function (ndx, element) {
			var data = getAttributes(element);

			$(element).replaceWith('<div id="atc_button_' + ndx + '"></div>');
			Shopatron('#atc_button_' + ndx).addToCartButton(data.requestData, data.options);
		});

		// Initialize Cart View
		$('*').filter(function () { return this.nodeName === 'TRON:CART'; }).each(function (ndx, element) {
			var data = getAttributes(element);

			$(element).replaceWith('<div id="shopatron_cart_' + ndx + '"></div>');
			Shopatron('#shopatron_cart_' + ndx).getCart(data.requestData, data.options);
		});

		// Initialize Quick Cart View
		$('*').filter(function () { return this.nodeName === 'TRON:QUICKCART'; }).each(function (ndx, element) {
			var data = getAttributes(element);

			$(element).replaceWith('<div id="shopatron_quick_cart_' + ndx + '"></div>');
			Shopatron('#shopatron_quick_cart_' + ndx).getQuickCart(data.requestData, data.options);
		});
	});

	/**
	 * This function will be called when a cart changes.  It will refresh the html with the up to date html
	 */
	refreshCart = function () {
		var queued;

		// Refresh cart
		while (autoRefreshQueue.length > 0) {
			queued = autoRefreshQueue.pop();
			queued.method.apply(queued.context, queued.args);
		}
	};

	/**
	 * Add an Add To Cart form to the page
	 *
	 * @param productData object {
	 *    partNumber: string
	 *    productLink: string
	 * }
	 * @param options object {
	 *    success: function // on success callback
	 *    error: function // on error callback
	 *    complete: function // on complete callback
	 *    clickSuccess: function // on success callback
	 *    clickError: function // on error callback
	 *    clickComplete: function // on complete callback
	 * }
	 */
	Shopatron.fn.addToCartButton = function (productData, options) {
		var partNumber = productData.partNumber;
		delete productData.partNumber;

		// Set defaults
		productData = $.extend({
		}, productData);

		options = $.extend({
		}, options);

		return this.each(function () {
			var buttonLocation = $(this);

			Shopatron.getProduct({
				partNumber: partNumber
			}, {
				templateFriendly: true,
				success: function (product) {
					var form, slaves = $('', form);

					// Build the html
					productData.partNumber = product.partNumber;
					productData.productOptions = product.productOptions;
					productData.showPrompt = product.optionSets === undefined;
					productData.messages = Shopatron.i18n.messages;
					form = $(JST.addToCartButton(productData));

					// Add submit button for form
					form.submit(function () {
						var errorMessage = [];

						// Look for options that have not been selected
						$.each($('.optn', form).serializeArray(), function () {
							var optionName;

							if (this.value === '') {
								optionName = this.name.match(/^itemOptions\[(.*)\]/, '')[1];
								errorMessage.push(Shopatron.i18n.messages.missingOption({
									optionName: product.productOptions[optionName].displayName
								}));
							}
						});

						// Only submit if all option have been selected
						if (errorMessage.length === 0) {
							// Submit the add to cart request
							Shopatron.addToCart(form.serializeForm(), {
								success: function (data, textStatus) {
									refreshCart();
									if ($.isFunction(options.clickSuccess)) {
										options.clickSuccess(data, textStatus);
									}
								},
								error: options.clickError,
								complete: options.clickComplete
							});
						} else {
							window.alert(errorMessage.join('\n'));
						}
					});

					// Build slaved option functionality
					if (product.optionSets !== undefined) {
						// Find slave options
						$.each(product.optionSets, function () {
							$.each(this.selectedOptions, function (optionName) {
								slaves = slaves.add('#itemOptions_' + optionName, form);
							});
						});

						// Add onchange handlers to all slave option selects
						slaves.filter('select').change(function () {
							var optionSelect = $(this), allowedOptions = {}, selectedOptionName = optionSelect.attr('id').replace(/^itemOptions_/, '');

							// Sync selection with hidden slaves
							slaves.not(this).children('[value="' + optionSelect.val() + '"]').attr('selected', 'selected');

							// Get the set of allowed options given that "this" option has been selected
							$.each(product.optionSets, function () {
								var optionSet = this;
								// Build the allowedOptions set

								if (optionSet.selectedOptions[selectedOptionName] === optionSelect.val() || optionSelect.val() === '') {
									$.each(optionSet.selectedOptions, function (optionName, optionValue) {
										if (optionName !== selectedOptionName) {
											if (allowedOptions[optionName] === undefined) {
												allowedOptions[optionName] = [];
											}
											allowedOptions[optionName].push(optionValue);
										}
									});
								}
							});

							// Filter out options that are not available
							slaves.not(this).attr('disabled', 'disabled').parent('.shptrn_product_option').hide();
							$.each(allowedOptions, function (optionName) {
								var optionValue = $('#itemOptions_' + optionName, form).children(':selected').attr('value');

								// Show options that are available
								$('#itemOptions_' + optionName, form).removeAttr('disabled').parent('.shptrn_product_option').show();

								// Sync selection with hidden slaves
								slaves.not(this).children('[value="' + optionValue + '"]').attr('selected', 'selected');
							});
						}).filter(':first').change();

						// Add keyup handlers to all slave option inputs
						slaves.filter('input').keyup(function () {
							var optionInput = $(this), classes;

							// Get the classes that this input has, in order to copy its value to the others
							classes = optionInput.attr('class');

							// Copy this inputs contents to all of the other inputs of the same group
							$('input[class="' + classes + '"]').val(optionInput.val());
						});
					}

					// Add the html to the page
					buttonLocation.html(form);

					if ($.isFunction(options.success)) {
						options.success(buttonLocation, product);
					}
				},
				error: options.error,
				complete: options.complete
			});
		});
	};

	/**
	 * Get the contents of the current cart.
	 *
	 * @param cartOptions object {
	 *    imageHeight: int
	 *    imageWidth: int
	 * }
	 * @param options object {
	 *    success: function // on success callback
	 *    error: function // on error callback
	 *    complete: function // on complete callback
	 * }
	 */
	Shopatron.fn.getCart = function (cartOptions, options) {
		// Set defaults
		cartOptions = $.extend({
			imageHeight: 100,
			imageWidth: 100
		}, cartOptions);

		options = $.extend({
		}, options);

		return this.each(function () {
			var cartLocation = $(this);

			Shopatron.getCart({
				success: function (cart) {
					var cartHTML;

					autoRefreshQueue.push({
						method: Shopatron.fn.getCart,
						context: cartLocation,
						args: [cartOptions, options]
					});

					cartOptions.cart = cart;
					cartOptions.messages = Shopatron.i18n.messages;
					cartHTML = $(JST.cart(cartOptions));
					cartHTML.find('.shptrn_checkout_button button').click(Shopatron.checkout);

					// Get the cartItem rows
					$.each(cart.cartItems, function () {
						var cartItem = this;

						// Build HTML
						cartItem.imageWidth = cartOptions.imageWidth;
						cartItem.imageHeight = cartOptions.imageHeight;

						// Add update quantity functionality
						cartHTML.find('#update_quantity_' + cartItem.cartItemID).click(function () {
							Shopatron.updateQuantity({
								cartItemID: cartItem.cartItemID,
								quantity: $('#quant_' + cartItem.cartItemID).val()
							}, {
								success: refreshCart
							});
						});

						// Add remove item functionality
						cartHTML.find('#remove_item_' + cartItem.cartItemID).click(function () {
							Shopatron.removeItem({
								cartItemID: cartItem.cartItemID
							}, {
								success: refreshCart
							});
						});
					});

					// Add the cart to page
					cartLocation.html(cartHTML);
					if ($.isFunction(options.success)) {
						options.success(cartLocation, cart);
					}
				},
				error: options.error,
				complete: options.complete,
				templateFriendly: true
			});
		});
	};

	/**
	 * Get the contents of the current cart.
	 *
	 * @param cartOptions object {
	 *    cartLink: string
	 * }
	 * @param options object {
	 *    success: function // on success callback
	 *    error: function // on error callback
	 *    complete: function // on complete callback
	 * }
	 */
	Shopatron.fn.getQuickCart = function (cartOptions, options) {
		// Set defaults
		cartOptions = $.extend({
		}, cartOptions);

		options = $.extend({
		}, options);

		return this.each(function () {
			var quickCartLocation = $(this);

			Shopatron.getCart({
				success: function (cart) {
					autoRefreshQueue.push({
						method: Shopatron.fn.getQuickCart,
						context: quickCartLocation,
						args: [cartOptions, options]
					});

					cartOptions.cart = cart;
					cartOptions.messages = Shopatron.i18n.messages;
					quickCartLocation.html(JST.quickCart(cartOptions));

					if ($.isFunction(options.success)) {
						options.success(quickCartLocation, cart);
					}
				},
				error: options.error,
				complete: options.complete
			});
		});
	};

	return Shopatron;
}(window, jQuery, Shopatron, JST));

	// Expose Shopatron as either a CommonJS module, an AMD module, or put it in the global space
	if (window.exports !== undefined) {
		if (window.module !== undefined && window.module.exports) {
			window.exports = window.module.exports = Shopatron;
		}
		window.exports.Shopatron = Shopatron;
	} else if (typeof define === 'function' && define.amd) {
		define(['shopatronAPI'], function() {
			return Shopatron;
		});
	} else {
		window.Shopatron = Shopatron;
	}
}(this, Shopatron));
