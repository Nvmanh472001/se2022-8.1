import React from 'react';
import { SafeAreaView, StyleSheet } from 'react-native';
import GLOBALS from '../../constants/GLOBALS';

const Layout = ({ children }) => {
    return (
        <SafeAreaView style={styles.containerArea}>
            {children}
        </SafeAreaView>
    );
};

const styles = StyleSheet.create({
    containerArea: {
        flex: 1,
        backgroundColor: GLOBALS.COLOR.PrimaryBackground,
    },
})


export default Layout;