import React, { Component } from 'react';

class ItemSliderInicial extends Component {

    state = {};

    componentWillMount() {
        this.setState({...(this.props.valores)});
    }

    render() {
        return (
            <div>
                <div
                    className="owl-item hero_slider_item item_1 d-flex flex-column align-items-center justify-content-center">
                    <h1>{this.state.Titulo}</h1>
                    <span>{this.state.Subtitulo}</span>
                    <span><img src={this.state.imagen} alt="" /></span>

                </div>

            </div>

        );
    }
}

export default ItemSliderInicial;
