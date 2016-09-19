# craft-password-enforcer

This plugin add the options for minimum length and regex pattern validation for passwords. By default, it enforces a length of 10 characters and requires letters, numbers and symbols.

## Settings
• Enforce Password Length Requirement - enables testing of password length, enabled by default.

• Minimum Password Length - the required password length, default 10.

• Enforce Regular Expression Pattern Validation - enables testing of passwords against a validation regex, enabled by default.

• Password Validation Regular Expression - the regular expression to test against, default `/^(?=.*[A-Za-z])(?=.*\d)(?=.*[$@$!%*#?&])[A-Za-z\d$@$!%*#?&]{8,}$/` which requires one or more letter, one or more symbols and one or more numbers.

• Password Validation Regular Expression Error Text - the error text returned when the regex comparison is failed, default is 'Your password must contain letters, numbers and symbols.'

This plugin is based on a code snippet from [Brandon Kelly on Stack Exchange](http://craftcms.stackexchange.com/a/12166).

## License

The MIT License (MIT)

Copyright (c) 2016 STAPLEGUN

Permission is hereby granted, free of charge, to any person obtaining a copy
of this software and associated documentation files (the "Software"), to deal
in the Software without restriction, including without limitation the rights
to use, copy, modify, merge, publish, distribute, sublicense, and/or sell
copies of the Software, and to permit persons to whom the Software is
furnished to do so, subject to the following conditions:

The above copyright notice and this permission notice shall be included in all
copies or substantial portions of the Software.

THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE
AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER
LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM,
OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN THE
SOFTWARE.
