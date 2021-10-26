function _defineProperty(obj, key, value) { if (key in obj) { Object.defineProperty(obj, key, { value: value, enumerable: true, configurable: true, writable: true }); } else { obj[key] = value; } return obj; }
const languages = [{
        name: 'C',
        year: 1972
    },

    {
        name: 'C#',
        year: 2000
    },

    {
        name: 'C++',
        year: 1983
    },

    {
        name: 'Clojure',
        year: 2007
    },

    {
        name: 'Elm',
        year: 2012
    },

    {
        name: 'Go',
        year: 2009
    },

    {
        name: 'Haskell',
        year: 1990
    },

    {
        name: 'Java',
        year: 1995
    },

    {
        name: 'Javascript',
        year: 1995
    },

    {
        name: 'Perl',
        year: 1987
    },

    {
        name: 'PHP',
        year: 1995
    },

    {
        name: 'Python',
        year: 1991
    },

    {
        name: 'Ruby',
        year: 1995
    },

    {
        name: 'Scala',
        year: 2003
    }
];



const escapeRegexCharacters = str => str.replace(/[.*+?^${}()|[\]\\]/g, '\\$&');

const getSuggestions = value => {
    const escapedValue = escapeRegexCharacters(value.trim());

    if (escapedValue === '') {
        return [];
    }

    const regex = new RegExp('^' + escapedValue, 'i');
    const suggestions = languages.filter(language => regex.test(language.name));

    if (suggestions.length === 0) {
        return [
            { isAddNew: true }
        ];

    }

    return suggestions;
};

class App extends React.Component {
    constructor() {
        super();
        _defineProperty(this, "onChange",

            (event, { newValue, method }) => {
                this.setState({
                    value: newValue
                });

            });
        _defineProperty(this, "getSuggestionValue",

            suggestion => {
                if (suggestion.isAddNew) {
                    return this.state.value;
                }

                return suggestion.name;
            });
        _defineProperty(this, "renderSuggestion",

            suggestion => {
                if (suggestion.isAddNew) {
                    return (
                        React.createElement("span", null, "[+] Add new: ",
                            React.createElement("strong", null, this.state.value)));


                }

                return suggestion.name;
            });
        _defineProperty(this, "onSuggestionsFetchRequested",

            ({ value }) => {
                this.setState({
                    suggestions: getSuggestions(value)
                });

            });
        _defineProperty(this, "onSuggestionsClearRequested",

            () => {
                this.setState({
                    suggestions: []
                });

            });
        _defineProperty(this, "onSuggestionSelected",

            (event, { suggestion }) => {
                if (suggestion.isAddNew) {
                    console.log('Add new:', this.state.value);
                }
            });
        this.state = { value: '', suggestions: [] };
    }

    render() {
        const { value, suggestions } = this.state;
        const inputProps = {
            placeholder: "Type 'c'",
            value,
            onChange: this.onChange
        };


        return (
            React.createElement(Autosuggest, {
                suggestions: suggestions,
                onSuggestionsFetchRequested: this.onSuggestionsFetchRequested,
                onSuggestionsClearRequested: this.onSuggestionsClearRequested,
                getSuggestionValue: this.getSuggestionValue,
                renderSuggestion: this.renderSuggestion,
                onSuggestionSelected: this.onSuggestionSelected,
                inputProps: inputProps
            }));


    }
}


ReactDOM.render(React.createElement(App, null), document.getElementById('app'));