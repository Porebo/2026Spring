# Apr 9, 2026 - PHP Comments, Variables, and Types

## Homework Review
- Daniel briefly reviewed HW11 before the main lecture.
- The homework mix continued to emphasize project progress while still reinforcing PHP and evaluation concepts.
- Students were encouraged to spend less time on the smaller lecture-aligned items and more time moving the final project forward.

## PHP Comments
- PHP supports single-line comments with `//`.
- PHP also supports single-line comments with `#`, unlike standard JavaScript.
- Multi-line comments use `/* ... */`.
- Daniel compared legal and illegal comment forms and used short exercises to reinforce the syntax.

## Variables and Naming Rules
- PHP variables are marked with a leading dollar sign, such as `$x`.
- The dollar sign signals to PHP that the following token is a variable; it is not considered part of the variable name itself.
- Hyphens are not allowed inside PHP variable names, but underscores are.
- Daniel contrasted this with JavaScript, where a leading dollar sign is optional rather than required.

## Strings, Quotes, and Concatenation
- Double-quoted strings in PHP can substitute variable values.
- Single-quoted strings do not interpolate variables in the same way.
- PHP concatenates strings with the period operator `.` rather than JavaScript's `+`.
- The class compared PHP output examples against JavaScript to make the differences easier to remember.

## Data Types and Inspection
- PHP data types discussed included `int`, `float`, `string`, `bool`, `array`, and `null`.
- `var_dump(...)` was introduced as a richer debugging tool than JavaScript's `typeof`, because it shows both type and value details.
- Students saw how arrays, strings, and scalar values are displayed differently.

## Type Casting and Conversion
- Daniel demonstrated explicit casting between ints, strings, booleans, and floats.
- Converting `5.34` to an int truncates it to `5`.
- Converting a non-numeric string like `"hello"` to an int yields `0`.
- Boolean `true` becomes `1`, consistent with common computing conventions.

## Constants and Magic Constants
- PHP constants can be defined with `define(...)`.
- Magic constants such as `__FILE__` and `__DIR__` reveal current file and directory context.
- These examples reinforced PHP's server-side execution model.

## Closing Theme
- PHP and JavaScript share many concepts, but their syntax and execution context differ.
- The most important difference remained the same: PHP usually runs on the server, while JavaScript usually runs in the browser.

